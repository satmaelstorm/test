<?php
declare(strict_types=1);

// table accounts
// |id | user_id | amount | currency |
// |1 | 123      | 10000  | rub      |
// |2 | 456      | 10000  | bonus    |
// |3 | 123      | 10000  | bonus    |
// |4 | 789      | 43535  | rub      | 

class MoneyTransfer {

	public function transfer($from, $to, $amount, $currency): void
	{
		DB::query("update accounts set amount=amount - $amount where user_id = {$from->getId()} and currency='$currency'");
		DB::query("update accounts set amount=amount + $amount where user_id = {$to->getId()} and currency='$currency'");
	}

}
