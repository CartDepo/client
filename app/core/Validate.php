<?php

class Validate {
    public static function checkDigitalInString(string $row): bool {
        $length = strlen($row);
        for ($i = 0; $i < $length; $i++) {
            if (is_numeric($row[$i])) {
                return true;
            }
        }
        return false;
    }

    public static function checkSymbolInString(string $row): bool {
        $length = strlen($row);
        for ($i = 0; $i < $length; $i++) {
            if (!is_numeric($row[$i])) {
                return true;
            }
        }
        return false;
    }

    public static function checkSpacesInString(string $row): bool {
        $length = strlen($row);
        for ($i = 0; $i < $length; $i++) {
            if ($row[$i] == " ") {
                return true;
            }
        }
        return false;
    }

    public static function trimArray(array $arr) {
        $res = [];
        foreach ($arr as $key => $item) {
            if (!is_array($item)) {
                $res[$key] = trim($item);
            } else {
                $res[$key] = $item;
            }
        }
        return $res;
    }

    public static function validateCurrency(string $name) {
        if (strlen($name) === 3) {
            if (Validate::checkDigitalInString($name) or Validate::checkSpacesInString($name)) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

    public static function validateDigital(string $name) {
        if (Validate::checkSymbolInString($name) or Validate::checkSpacesInString($name)) {
            return false;
        } else {
            return true;
        }
    }

    public static function validateDigitalFields(array $fields, $data) {
        $invalidParams = [];
        foreach ($fields as $field) {
            if (isset($data[$field]) and !Validate::validateDigital($data[$field])) {
                $invalidParams[$field] = "not valid";
            }
        }
        return $invalidParams;
    }
}