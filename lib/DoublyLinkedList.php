<?php
/*
 * Copyright (C)  2016  Woody Whitman.
 * Permission is granted to copy, distribute and/or modify this document
 * under the terms of the GNU Free Documentation License, Version 1.3
 * or any later version published by the Free Software Foundation;
 */
namespace DLList;

/**
 * @project php-doublylinkedlist
 * @class DLList\DoublyLinkedList
 * @author Woody Whitman <woodywhitman@gmail.com>
 * 
 * DoublyLinkedList is the class definition of an implementation of 
 * a doubly linked list.
 * 
 * References used for implementation
 * Data Structure - Doubly Linked List
 * @link http://www.tutorialspoint.com/data_structures_algorithms/doubly_linked_list_algorithm.htm
 * Big Oh Notation
 * Gersting, Judith L. Mathematical Structures for Computer Science. 
 *      New York: Computer Science, 1993. Print.
 * 
 */
class DoublyLinkedList {

    /**
     * Numerical count of nodes in list.
     * @var integer 
     */
    private $_count;
    /**
     * Current node in the doubly linked list. 
     * @var \DLList\Node 
     */
    private $_current;
    /**
     * Container for Error Messages experienced during execution.
     * @var string[]
     */
    private $_errors;
    /**
     * First node in the doubly linked list.
     * @var \DLList\Node 
     */
    private $_head;
    /**
     * True/False flag for list to operate reversed.
     * @var boolean
     */
    private $_isReversed;
    /**
     * Last node in the doubly linked list.
     * @var \DLList\Node 
     */
    private $_tail;

    /* PUBLIC METHODS */
    
    /**
     * DoublyLinkedList constructor for a doubly linked list. 
     * Initializes all private attributes to an empty list
     */
    public function __construct() {
        $this->_count = 0;
        $this->_current = NULL;
        $this->_head = NULL;
        $this->_isReversed = FALSE;
        $this->_tail = NULL;
    }
    
    /**
     * Adds an element to the list and returns the element with the previous and 
     * next attributes set where appropriate.
     * @param \DLList\Node $newNode
     * @return \DLList\Node
     */
    public function add($newNode) {
        if (!$this->_count) {
            return $this->insertEmpty($newNode);
        } else {
            return $this->insertNode($newNode);
        }
    }
    
    /**
     * Returns the current numerical count of items in the list.
     * @return integer
     */
    public function count() {
        return $this->_count;
    }
    
    /**
     * Returns the current node is the doubly linked list and 
     * throws an exception if the list is empty or current is empty.
     * @return \DLList\Node
     * @throws \Exception
     */
    public function current() {
        if (!$this->_count) {
            $errorMessage = "Error: Doubly Linked List is Empty.";
            $this->_errors[] = $errorMessage;
            throw new \Exception($errorMessage);
        }
        if ($this->_current === NULL) {
            $errorMessage = "Error: Doubly Linked List Current is Empty.";
            $this->_errors[] = $errorMessage;
            throw new \Exception($errorMessage);
        }
        
        return $this->_current;
    }
    
    /**
     * Returns 
     * @return \Exception[]
     */
    public function errors() {
        return $this->_errors;
    }
    
    /**
     * Returns the first/head element in the linked list. However if reverse() method
     * has been called setting isReversed to TRUE then it will return the tail
     * node in the list aka the tail.
     * Sets current attribute to the value of the returned node.
     * @return \DLList\Node
     */
    public function first() {
        $this->_current = $this->_isReversed ? $this->_tail : $this->_head;
        return $this->_current;
    }
    
    /**
     * Returns the last/tail element in the linked list. However if reverse() method
     * has been called setting isReversed to TRUE then it will return the first
     * node in the list aka the head.
     * Sets current attribute to the value of the returned node.
     * @return \DLList\Node
     */
    public function last() {
        $this->_current = $this->_isReversed ? $this->_head : $this->_tail;
        return $this->_current;
    }
    
    /**
     * Returns the next element in the linked list after the current one. 
     * However if reverse() method has been called setting isReversed to TRUE 
     * then it will return the previous node in the list.
     * Sets current attribute to the value of the returned node.
     * @return \DLList\Node
     */
    public function next() {
        $result = NULL;
        if ($this->_isReversed) {
            $result = $this->_current->getPrevious();
        } else {
            $result = $this->_current->getNext();
        }
        $this->_current = $result;
        return $result;
    }
    
    /**
     * Returns the previous element in the linked list before the current one. 
     * However if reverse() method has been called setting isReversed to TRUE 
     * then it will return the next node in the list.
     * Sets current attribute to the value of the returned node.
     * @return \DLList\Node
     */
    public function previous() {
        $result = NULL;
        if ($this->_isReversed) {
            $result = $this->_current->getNext();
        } else {
            $result = $this->_current->getPrevious();
        }
        $this->_current = $result;
        return $result;
    }
    
    /**
     * Sets the flag for the doubly linked list to operate in reverse. 
     * Causes first(), last(), next(), and previous() to operate "in reverse"
     * @param boolean $reverseOrder
     * @return boolean
     */
    public function reverse($reverseOrder = TRUE) {
        $this->_isReversed = $reverseOrder;
        return $this->_isReversed;
    }
    
    /**
     * Returns TRUE/FALSE based upon whether the current() method will return a valid result.
     * @return boolean
     */
    public function valid() {
        try {        
            return is_object($this->current());
        } catch (\Exception $exc) {
            if (!count($this->_errors) || $exc->getMessage() != $this->_errors[count($this->_errors)-1]) {
                $this->_errors[] = $exc->getMessage();
            }
            return FALSE;
        }
    }
    
    /* PROTECTED METHODS */
    
    /**
     * Inserts New Node object before the given List Node in the List
     * @param \DLList\Node $listNode
     * @param \DLList\Node $newNode
     * @return \DLList\Node
     */
    protected function insertAfter($listNode, $newNode) { 
        $next = $listNode->getNext();
        if (!$next) {
            $this->_tail = $newNode;
        } else {
            $next->setPrevious($newNode);
        }        
        $newNode->setNext($next);
        $newNode->setPrevious($listNode);
        $listNode->setNext($newNode);
        $this->_count++;        
        return $newNode;
    }
    
    /**
     * Inserts New Node object before the given List Node in the List
     * @param \DLList\Node $listNode
     * @param \DLList\Node $newNode
     * @return \DLList\Node
     */
    protected function insertBefore($listNode, $newNode) {
        $previous = $listNode->getPrevious();
        if (!$previous) {
            $this->_head = $newNode;
        } else {
            $previous->setNext($newNode);
        }
        $newNode->setPrevious($previous);
        $newNode->setNext($listNode);
        $listNode->setPrevious($newNode);
        $this->_count++;        
        return $newNode;
    }
    
    /**
     * Inserts New Node object into an empty List or resets the list with 
     * the single element if so desired.
     * @param \DLList\Node $newNode
     * @return \DLList\Node
     */
    protected function insertEmpty($newNode) {
        
        $this->_head = $newNode;
        $this->_tail = $newNode;
        $this->_count = 1;
        
        return $newNode;
    }
    
    /**
     * Inserts New Node object before the given List Node in the List
     * @param \DLList\Node $newNode
     * @return \DLList\Node
     */
    protected function insertNode($newNode) {
        // Assumes List has been check for empty list!
        $currentNode = $this->_head;
        $set = false;
        while ($currentNode != NULL) {
            if ($currentNode->getData() > $newNode->getData()) {
                $newNode = $this->insertBefore($currentNode, $newNode);
                $currentNode = NULL;
                $set = true;
            } else {
                $currentNode = $currentNode->getNext();
            }
        }
        if (!$set) {
            $newNode = $this->insertAfter($this->last(), $newNode);
        }
        
        return $newNode;
    }
}
