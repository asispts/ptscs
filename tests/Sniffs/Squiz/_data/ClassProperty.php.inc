<?php

class Class1
{


    private $var1;


}
class Class2
{
    /** @doc */


    private $var1;
}
class Class3
{
    #[attribute]


    private $var1;
}
class Class4
{
    /** docs */


    #[attribute]


    private $var1;
}
class Class5
{
    #[attribute]


    /** docs */


    private $var1;
}
