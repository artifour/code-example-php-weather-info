<?php

namespace App\Serializer;

use App\Contract\SerializerInterface;
use App\Contract\XmlSerializable;

class XmlSerializer implements SerializerInterface
{
    private const SCHEMA = <<<XML
<?xml version="1.0"?>
<data>
</data>
XML;

    /**
     * @inheritDoc
     *
     * @param XmlSerializable|object|array $data
     */
    public function serialize($data): string
    {
        $attributes = $this->prepareAttributes($data);

        $xml = new \SimpleXMLElement(self::SCHEMA);
        foreach ($attributes as $name => $value) {
            $xml->addChild($name, $this->formatValue($value));
        }

        return $xml->asXML();
    }

    /**
     * @param XmlSerializable|object|array $data
     *
     * @return array
     */
    private function prepareAttributes($data): array
    {
        if ($data instanceof XmlSerializable) {
            return $data->xmlSerialize();
        }

        return (array)$data;
    }

    /**
     * @param mixed $value
     *
     * @return string|null
     */
    private function formatValue($value): ?string
    {
        if (is_bool($value)) {
            return $value ? 'true' : 'false';
        }

        return htmlspecialchars($value);
    }
}
