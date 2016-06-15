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
 * @class DLList\Node
 * @author Woody Whitman <woodywhitman@gmail.com>
 * 
 * Node is the class definition of a singular node in this current 
 * implementation of a doubly linked list.
 * 
 * References used for implementation
 * Data Structure - Doubly Linked List
 * @link http://www.tutorialspoint.com/data_structures_algorithms/doubly_linked_list_algorithm.htm
 * Big Oh Notation
 * Gersting, Judith L. Mathematical Structures for Computer Science. New York: Computer Science, 1993. Print.
 * 
 * @property integer $_data integer value of the node data.
 * @property \DLList\Node $_next Postceding node in the doubly linked list.
 * @property \DLList\Node $_previous Preceding node in the doubly linked list.
 */
class Node {

    private $_data;
    private $_previous;
    private $_next;

    /**
     * Node constructor for a single item in the doubly linked list. 
     * A single paramter is required containing the integer value of the data 
     * contained within the node.
     * @param integer $data
     */
    public function __construct($data) {
        $this->setData($data);
    }

    /**
     * Node getter for data attribute of the individual node.
     * Returns the single integer data attribute of the instantiated node.
     * @return integer
     */
    public function getData() {
        return $this->_data;
    }

    /**
     * Node setter for data attribute of the individual node. 
     * A single paramter is required containing the integer value of the data 
     * contained within the node.
     * @param integer $data
     */
    public function setData($data) {
        $this->_data = $data;
    }

    /**
     * Node getter for postceding node in the doubly linked list.
     * Returns the single integer data attribute of the instantiated node.
     * @return \DLList\Node
     */
    public function getNext() {
        return $this->_next;
    }

    /**
     * Node getter for postceding node in the doubly linked list.
     * A single paramter is required containing the postceding node.
     * Returns the single integer data attribute of the instantiated node.
     * @param \DLList\Node
     * @return \DLList\Node
     */
    public function setNext($node) {
        $this->_next = $node;
        return $this->_next;
    }

    /**
     * Node getter for preceding node in the doubly linked list.
     * Returns the single integer data attribute of the instantiated node.
     * @return \DLList\Node
     */
    public function getPrevious() {
        return $this->_previous;
    }

    /**
     * Node getter for preceding node in the doubly linked list.
     * A single paramter is required containing the preceding node.
     * Returns the single integer data attribute of the instantiated node.
     * @param \DLList\Node
     * @return \DLList\Node
     */
    public function setPrevious($node) {
        $this->_previous = $node;
        return $this->_previous;
    }
}
