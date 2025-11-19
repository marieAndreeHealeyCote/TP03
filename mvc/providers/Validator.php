<?php

namespace App\Providers;

class Validator
{
    private $errors = array();
    private $key;
    private $value;
    private $name;
    public function field($key, $value, $name = null)
    {
        $this->key = $key;
        $this->value = $value;
        if ($name == null) {
            $this->name = ucfirst($key);
        } else {
            $this->name = ucfirst($name);
        }
        return $this;
    }
    public function required()
    {
        if (empty($this->value)) {
            $this->errors[$this->key] = "$this->name is required.";
        }
        return $this;
    }
    public function max($length)
    {
        //dans le cas d'un upload
        if (is_array($this->value) && isset($this->value['size'])) {
            if ($this->value['size'] > $length) {
                $this->errors[$this->key] = "Your file is too large.";
                return $this;
            }
        }
        //dans le cas d'une valeur textuelle
        if (strlen($this->value) > $length) {
            $this->errors[$this->key] = "$this->name must be less than $length characters";
        }
        return $this;
    }
    public function min($length)
    {
        //dans le cas d'un upload
        if (is_array($this->value) && isset($this->value['size'])) {
            if ($this->value['size'] < $length) {
                $this->errors[$this->key] = "Your file is too large.";
                return $this;
            }
        }
        //dans le cas d'une valeur textuelle
        if (strlen($this->value) < $length) {
            $this->errors[$this->key] = "$this->name must be more than $length characters";
        }
        return $this;
    }
    public function image()
    {
        if (!is_array($this->value) && !isset($this->value['tmp_name'])) {
            if (getimagesize($this->value["tmp_name"]) == false) {
                $this->errors[$this->key] = "$this->name must be an image.";
            }
        }
        return $this;
    }
    public function fileType($fileTypes)
    {
        if (!in_array($this->value['type'], $fileTypes)) {
            $this->errors[$this->key] = "$this->name is not in the required format: " . implode(',', $fileTypes);
        }
        return $this;
    }
    public function number()
    {
        if (!empty($this->value) && !is_numeric($this->value)) {
            $this->errors[$this->key] = "$this->name must be a number.";
        }
        return $this;
    }
    public function int()
    {
        if (!filter_var($this->value, FILTER_VALIDATE_INT)) {
            $this->errors[$this->key] = "$this->name must be an interger.";
        }
        return $this;
    }
    public function float()
    {
        if (!filter_var($this->value, FILTER_VALIDATE_FLOAT)) {
            $this->errors[$this->key] = "$this->name must be a decimal.";
        }
        return $this;
    }
    public function bigger($limit)
    {
        if ($this->value >= $limit) {
            $this->errors[$this->key] = "$this->name must be less than or equal to $limit.";
        }
        return $this;
    }
    public function lower($limit)
    {
        if ($this->value <= $limit) {
            $this->errors[$this->key] = "$this->name must be bigger than or equal to $limit.";
        }
        return $this;
    }
    public function email()
    {
        if (!empty($this->value) && !filter_var($this->value, FILTER_VALIDATE_EMAIL)) {
            $this->errors[$this->key] = "Invalid $this->name format.";
        }
        return $this;
    }
    public function validateDate($format = 'Y-m-d')
    {
        $date = \DateTime::createFromFormat($format, $this->value);
        if (!$date || $date->format($format) !== $this->value) {
            $this->errors[$this->key] = "Invalid $this->name format. Please use $format format.";
        }
        return $this;
    }

    public function unique($model)
    {
        $model = 'App\\Models\\' . $model;
        $model = new $model;
        $unique = $model->unique($this->key, $this->value);
        if ($unique) {
            $this->errors[$this->key] = "$this->name must be unique.";
        }
        return $this;
    }

    // Règles de fin
    public function isSuccess()
    {
        if (empty($this->errors)) return true;
    }
    public function getErrors()
    {
        if (!$this->isSuccess()) return $this->errors;
    }
}
