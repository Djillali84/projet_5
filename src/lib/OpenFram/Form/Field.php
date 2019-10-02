<?php


namespace OpenFram\Form;


use OpenFram\Hydrator;

abstract class Field
{
    use Hydrator;

    protected $errorMessage;
    protected $success;
    protected $label;


    protected $name;
    protected $value;


    protected $openingGroupTags = '';
    protected $closingGroupTags = '';
    protected $validators = [];

    public function __construct(array $options = [])
    {
        if (!empty($options)) {
            $this->hydrate($options);
        }
    }

    abstract public function buildWidget();

    public function isValid()
    {
        foreach ($this->validators as $validator) {
            if (!$validator->isValid($this->value)) {
                $this->errorMessage = $validator->getErrorMessage();

                return  $this->success = false;
            }
        }

        return  $this->success = true;
    }


    /**
     * @return mixed
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param mixed $label
     */
    public function setLabel(string $label)
    {
            $this->label = $label;

    }

    /**
     * @return mixed
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName(string $name)
    {
            $this->name = $name;

    }



    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue(?string $value)
    {
            $this->value = $value;

    }

    /**
     * @return array
     */
    public function getValidators(): array
    {
        return $this->validators;
    }

    /**
     * @param array $validators
     */
    public function setValidators(array $validators)
    {
        foreach ($validators as $validator) {
            if ($validator instanceof Validator && !in_array($validator, $this->validators)) {
                $this->validators[] = $validator;
            }
        }
    }

    /**
     * @return string
     */
    public function getOpeningGroupTags(): string
    {
        return $this->openingGroupTags;
    }

    /**
     * @param string $openingGroupTags
     */
    public function setOpeningGroupTags(string $openingGroupTags): void
    {
        $this->openingGroupTags = $openingGroupTags;
    }

    /**
     * @return string
     */
    public function getClosingGroupTags(): string
    {
        return $this->closingGroupTags;
    }

    /**
     * @param string $closingGroupTags
     */
    public function setClosingGroupTags(string $closingGroupTags): void
    {
        $this->closingGroupTags = $closingGroupTags;
    }



}