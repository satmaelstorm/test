<?php
declare(strict_types=1);

class MoneyTransfer {

	public function transfer($from, $to, $amount): void
	{
		DB::query("update account set amount=amount - $amount where user_id = {$from->getId()}");
		DB::query("update account set amount=amount + $amount where user_id = {$to->getId()}");
	}

}
