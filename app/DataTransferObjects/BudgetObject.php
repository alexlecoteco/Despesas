<?php

namespace App\DataTransferObjects;

use Illuminate\Support\Carbon;

readonly class BudgetObject
{
    public function __construct(
        private string  $name,
        private string  $amount,
        private Carbon  $dueDate,
        private ?string $description = null,
        private ?BudgetObject $associatedBudget = null
    )
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAmount(): string
    {
        return $this->amount;
    }

    public function getDueDate(): Carbon
    {
        return $this->dueDate;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getAssociatedBudget(): ?BudgetObject
    {
        return $this->associatedBudget;
    }
}
