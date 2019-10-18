<?php
interface ResponseInterface{
    public function getCode();
    public function getMessage();
    public function getResultCount();
    public function getData();
    public function getSearch();
}