<?php
function CodelandUsernameValidation($str) {
    // code goes here
    $codelandUsernameValidator = new CodelandUsernameValidator($str);
    $codelandUsernameValidator->validate();
    return $codelandUsernameValidator->isValid();
}

class CodelandUsernameValidator
{
    private $username;
    private $isValid;

    public function __construct(string $username)
    {
        $this->username = $username;
    }

    public function validate(): void
    {
        $this->isValid = $this->isValidLength() && $this->isValidFirstLetter() &&
            $this->isValidComposition() && $this->isValidLastLetter();
    }

    public function isValid(): string
    {
        return $this->isValid ? 'true' : 'false';
    }

    private function isValidLength(): bool
    {
        $usernameStringCount = strlen($this->username);

        return $usernameStringCount >= 4 && $usernameStringCount <= 25;
    }

    private function isValidFirstLetter(): bool
    {
        return preg_match('/^[A-Za-z]/', $this->username);
    }

    private function isValidLastLetter(): bool
    {
        return !preg_match("/_$/", $this->username);
    }

    private function isValidComposition(): bool
    {
        return preg_match('/^[a-zA-Z0-9_\\-]+$/', $this->username);
    }
}