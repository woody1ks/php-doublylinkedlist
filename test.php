<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require 'lib/DoublyLinkedList.php';
require 'lib/Node.php';

use DLList\Node;
use DLList\DoublyLinkedList;
const CR = "\r\n";


$values = [4,34,6,23,7,81,1];

$doublyLinkedList = new DoublyLinkedList();

foreach ($values as $value) {
    echo "Adding Value {$value}";
    echo CR;
    $newNode = new Node($value);
    
    $doublyLinkedList->add($newNode);
}

echo CR;
$firstNode = $doublyLinkedList->first();
echo "First Value {$firstNode->getData()}";
echo CR;
$nextNode = $doublyLinkedList->next();
echo "Next Value {$nextNode->getData()}";
echo CR;
$nextNode = $doublyLinkedList->next();
echo "Next Value {$nextNode->getData()}";
echo CR;
$nextNode = $doublyLinkedList->next();
echo "Next Value {$nextNode->getData()}";
echo CR;
$nextNode = $doublyLinkedList->next();
echo "Next Value {$nextNode->getData()}";
echo CR;
$nextNode = $doublyLinkedList->next();
echo "Next Value {$nextNode->getData()}";
echo CR;
$nextNode = $doublyLinkedList->next();
echo "Next Value {$nextNode->getData()}";
echo CR;
$lastNode = $doublyLinkedList->last();
echo "Last Value {$lastNode->getData()}";
echo CR;
$doublyLinkedList->reverse();

echo CR;
$firstNode = $doublyLinkedList->first();
echo "First Value {$firstNode->getData()}";
echo CR;
$nextNode = $doublyLinkedList->next();
echo "Next Value {$nextNode->getData()}";
echo CR;
$nextNode = $doublyLinkedList->next();
echo "Next Value {$nextNode->getData()}";
echo CR;
$nextNode = $doublyLinkedList->next();
echo "Next Value {$nextNode->getData()}";
echo CR;
$nextNode = $doublyLinkedList->next();
echo "Next Value {$nextNode->getData()}";
echo CR;
$nextNode = $doublyLinkedList->next();
echo "Next Value {$nextNode->getData()}";
echo CR;
$nextNode = $doublyLinkedList->next();
echo "Next Value {$nextNode->getData()}";
echo CR;
$lastNode = $doublyLinkedList->last();
echo "Last Value {$lastNode->getData()}";
echo CR;

$doublyLinkedList->next();
$doublyLinkedList->current();
