<?php

declare(strict_types=1);

$transactions = [
    [
        "id" => 1,
        "date" => "2022-01-01",
        "amount" => 100.00,
        "description" => "Payment for groceries",
        "merchant" => "SuperMart",
    ],
    [
        "id" => 2,
        "date" => "2020-02-15",
        "amount" => 75.50,
        "description" => "Dinner with friends",
        "merchant" => "Local Restaurant",
    ]
];
require_once 'array_functions.php';

?>

<table border='1'>
    <thead>
        <tr>
            <?php foreach (array_keys($transactions[0]) as $key): ?>
                <th><?php echo $key ; ?></th>
            <?php endforeach; ?>
            <th>Transaction days</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($transactions as $transaction): ?>
            <tr>
                <?php foreach ($transaction as $value): ?>
                    <td><?php echo $value; ?></td>
                <?php endforeach; ?>
                <!-- Вывод количества прошедших дней транзакции -->
                <td><?php echo daysSinceTransaction($transaction["date"])?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="array-sum">
    <p>Total transactions amount:<?php echo calculateTotalAmount($transactions) ?></p>
    <p>Find transcation by id: <?php print_r(findTransactionById(1, $transactions)) ?></p>
    <p>Find transaction by id and array filter: <?php print_r(findTransactionByIdWithArrayFilter(2, $transactions)) ?></p>

    <h3>Sort by Date</h3>   
    <p>
        <?php sortArrayByDate(); print_r($transactions) ?>
    </p>
    <h3>Sort By amount desc</h3>
    <p>
        <?php sortArrayByAmountDesc(); print_r(value: $transactions)?>
    </p>
    
            
</div>


