<?php

use PHPUnit\Framework\TestCase;

require_once 'UnitTest.php';

final class StylesheetTest extends UnitTest
{
    protected $values;

    protected function setUp()
    {
        $this->values = array(
            'stylesheet' => 'Test stylesheet',
            'name' => 'Test Name',
            'attachedto' => 'Test attachment',
            'tid' => 2
        );
    }

    public function testCreate()
    {
        $v = $this->values;
        $entity = new Shinka_Core_Entity_Stylesheet(
            $v['stylesheet'],
            $v['name'],
            $v['attachedto'],
            $v['tid']
        );

        $this->assertInstanceOf(
            Shinka_Core_Entity_Stylesheet::class,
            $entity
        );

        foreach ($v as $key => $value) {
            $this->assertEquals(
                $entity->$key,
                $value
            );
        }
    }

    public function testCreateSetsDefaults()
    {
        $v = $this->values;

        $entity = new Shinka_Core_Entity_Stylesheet(
            $v['stylesheet'],
            $v['name'],
            null,
            null
        );

        $this->assertEquals(
            $entity->attachedto,
            Shinka_Core_Entity_Stylesheet::DEFAULTS['attachedto']
        );

        $this->assertEquals(
            $entity->tid,
            Shinka_Core_Entity_Stylesheet::DEFAULTS['tid']
        );
    }

    public function testFromDirectory()
    {
        $entities = Shinka_Core_Entity_Stylesheet::fromDirectory(MYBB_ROOT . "tests/stylesheets");

        foreach ($entities as $ndx => $entity) {
            $this->assertInstanceOf(
                Shinka_Core_Entity_Stylesheet::class,
                $entity
            );

            $this->assertEquals(
                $entity->name,
                "$ndx-name.html"
            );

            $this->assertEquals(
                $entity->stylesheet,
                "$ndx-contents"
            );
        }
    }

    public function testToArray()
    {
        $v = $this->values;
        $entity = new Shinka_Core_Entity_Stylesheet(
            $v['stylesheet'],
            $v['name'],
            $v['attachedto'],
            $v['tid']
        );

        $this->assertEquals(
            $entity->toArray(),
            $v
        );
    }
}

