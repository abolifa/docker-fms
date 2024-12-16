<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = [];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function tank()
    {
        return $this->belongsTo(Tank::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    protected static function boot()
    {
        parent::boot();

        // Handle creating a new transaction
        static::creating(function (Transaction $transaction) {
            $transaction->adjustValues(-$transaction->amount);
        });

        // Handle updating an existing transaction
        static::updating(function (Transaction $transaction) {
            $originalAmount = $transaction->getOriginal('amount');
            $transaction->adjustValues($originalAmount); // Revert original deduction
            $transaction->adjustValues(-$transaction->amount); // Apply new deduction
        });

        // Handle deleting a transaction
        static::deleting(function (Transaction $transaction) {
            $transaction->adjustValues($transaction->amount); // Revert the deduction
        });
    }

    /**
     * Adjust tank and employee values by the given amount.
     *
     * @param float $amount Positive to add, negative to deduct.
     */
    protected function adjustValues(float $amount)
    {
        $tank = $this->tank;
        $employee = $this->employee;

        if ($tank) {
            $tank->level += $amount; // Add or deduct from tank level
            $tank->save();
        }

        if ($employee) {
            $employee->quota += $amount; // Add or deduct from employee quota
            $employee->save();
        }
    }
}
