<?php

declare(strict_types=1);



/**
 * Summary of calculateTotalAmount
 * @param array $transactions - массив транзакций суммка которых будет вычисляться
 * @return float|int - конечная сумма транзакций
 */
function calculateTotalAmount(array $transactions): float{
    $totalAmount = 0;
    foreach($transactions as $transaction ){
        $totalAmount += $transaction["amount"];    
    }
    return $totalAmount;
}


/**
 * Summary of findTransactionByDescription
 * @param string $descriptionPart - часть описания по которому будет производиться поиск
 * @param array $transactions - массив транзакций в котором будет производится поиск
 * @return array - возврщает транзакцию с похожим описание
 */
function findTransactionByDescription(string $descriptionPart, array $transactions): array{
    foreach($transactions as $transaction){
        if(stripos($transaction["description"], $descriptionPart) !== false){
            return $transaction;
        }
    }
    return [];
}

/**
 * Summary of findTransactionById
 * @param int $id - id искомой транзакции
 * @param array $transactions - массив в котором будет искаться транзакция
 * @return array
 */
function findTransactionById(int $id, array $transactions):array{
    foreach($transactions as $transaction){
        if($transaction["id"] == $id){
            return $transaction;
        }
    }
    return [];
    
}

## By array filter and anonymus function
/**
 * Summary of findTransactionByIdWithArrayFilter - в данном методе для посика используется array_filter
 * @param int $id - id искомой транзакции
 * @param mixed $transactions - массив в котором будет искаться транзакция
 */
function findTransactionByIdWithArrayFilter(int $id, $transactions){
    $transaction = array_filter($transactions, function($transaction) use ($id){
        return $transaction["id"] == $id;
    }); 

    return array_pop($transaction);
}


/**
 * Summary of daysSinceTransaction - метод вычисляет сколько дней прошло со дня обработки транзакции
 * @param string $date - время транзакции
 * @return int - число дней со дня обпаботки транзакции
 */
function daysSinceTransaction(string $date): int{
    $transactionDate = new DateTime($date);
    $currentDate = new DateTime();
    $interval = $transactionDate->diff($currentDate);
    return $interval->days;
}


/**
 * Summary of addTransaction - мето для добавления новой транзакции
 * @param int $id - транзакции
 * @param string $date - дата
 * @param float $amount - сумма
 * @param string $description - описание
 * @param string $merchant - товар
 * @return void - метод ничего не возвращает
 */
function addTransaction(int $id, string $date, float $amount, string $description, string $merchant): void{
    $transaction = [
        "id"=> $id,
        "date"=> $date,
        "amount"=> $amount,
        "description"=> $description,
        "merchant"=> $merchant
    ];
    global $transactions;
    array_push($transactions, $transaction);
}

/**
 * Summary of sortArrayByDate - сортирует массив транзакции по датам транзакций
 * @return void
 */
function sortArrayByDate() {
    global $transactions;
    usort($transactions, 
    function($transactionA, $transactionB){
        return strtotime($transactionA['date']) - strtotime($transactionB['date']);
    });
}

/**
 * Summary of sortArrayByAmountDesc - сортирует массив транзакций по сумме транзакций в убывающем порядке
 * @return void - метод ничего не возвращает
 */
function sortArrayByAmountDesc() {
    global $transactions;
    usort($transactions, 
    function($transactionA, $transactionB){
        return $transactionB['amount'] - $transactionA['amount'];
    });   
}


