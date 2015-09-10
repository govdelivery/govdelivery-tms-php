<?php
namespace Tms\Resource;

class Recipients
{
    protected $recipients = array();

    public function build(array $recipient)
    {
        array_push($this->recipients, $recipient);
    }

    public function get()
    {
        return array('recipients' => $this->recipients);
    }
}
