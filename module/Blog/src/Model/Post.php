<?php
/**
 * 
 * @author SopheakChhin
 * @date Jul 13, 2016
 * @time 4:41:18 PM
 */
namespace Blog\Model;

class Post
{
    /*
     * @var int
     */
    private $id;
    /*
     * @var string
     */
    private $text;
    /*
     * @var string
     */
    private $title;
    
    /**
     * @param string $title
     * @param string $text
     * @param int|null $id
     */
    public function __construct($title, $text, $id=NULL)
    {
        $this->title = $title;
        $this->text = $text;
        $this->id = $id;
    }
    
    /*
     * return int
     */
    public function getId()
    {
        return $this->id;
    }
    /*
     * return string
     */
    public function getText()
    {
        return $this->text;
    }
    public function getTitle()
    {
        return $this->title;
    }
}