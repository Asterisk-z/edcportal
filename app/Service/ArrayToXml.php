<?php
namespace App\Service;

use DOMDocument;

class ArrayToXml {

    public $process;
    public $emptyContainer;
    public $containerList = [];

    public function  __construct() {
        // $this->data = $data;
        $this->process = new DOMDocument();
    }

    public function emptyElement($tagName , $parent = false) {

        if ($parent) {
            $this->emptyContainer = array_pop($this->containerList);
        }
        // Check for exiting Container
        if($this->emptyContainer) {
            array_push($this->containerList, $this->emptyContainer);
            $this->emptyContainer = $this->containerList[count($this->containerList) - 1]->
                                        appendChild($this->process->createElement($tagName));
        } else {

            if ($parent) {
                $this->containerList[count($this->containerList) - 1]->appendChild($this->process->createElement($tagName));
            } else {
                $this->emptyContainer = $this->process->appendChild($this->process->createElement($tagName));
            }


        }


    }

    public function insideEmptyElement($tag, $value) {

        // if($parent) {
        //     $this->containerList[count($this->containerList) - 1]->appendChild($this->process->createElement($tag, $value));
        // }else {
            $this->emptyContainer->appendChild($this->process->createElement($tag, $value));
        // }


    }

    public function addElement() {
        $this->emptyContainer = null;
        $this->process->appendChild($this->process->createElement("Tag", 'Value'));
    }

    public function getContent() {
        return $this->process->saveXML();
    }


}
