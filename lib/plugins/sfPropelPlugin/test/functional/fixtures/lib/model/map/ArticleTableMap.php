<?php


/**
 * This class defines the structure of the 'article' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Wed Sep 22 05:06:11 2010
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class ArticleTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.ArticleTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('article');
		$this->setPhpName('Article');
		$this->setClassname('Article');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('TITLE', 'Title', 'VARCHAR', true, 255, null);
		$this->addColumn('BODY', 'Body', 'LONGVARCHAR', false, null, null);
		$this->addColumn('ONLINE', 'Online', 'BOOLEAN', false, null, null);
		$this->addColumn('EXCERPT', 'Excerpt', 'VARCHAR', false, 255, null);
		$this->addForeignKey('CATEGORY_ID', 'CategoryId', 'INTEGER', 'category', 'ID', true, null, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('END_DATE', 'EndDate', 'TIMESTAMP', false, null, null);
		$this->addForeignKey('BOOK_ID', 'BookId', 'INTEGER', 'book', 'ID', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Category', 'Category', RelationMap::MANY_TO_ONE, array('category_id' => 'id', ), null, null);
    $this->addRelation('Book', 'Book', RelationMap::MANY_TO_ONE, array('book_id' => 'id', ), null, null);
    $this->addRelation('AuthorArticle', 'AuthorArticle', RelationMap::ONE_TO_MANY, array('id' => 'article_id', ), null, null);
    $this->addRelation('Attachment', 'Attachment', RelationMap::ONE_TO_MANY, array('id' => 'article_id', ), null, null);
	} // buildRelations()

	/**
	 * 
	 * Gets the list of behaviors registered for this table
	 * 
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
			'symfony_timestampable' => array('create_column' => 'created_at', ),
		);
	} // getBehaviors()

} // ArticleTableMap
