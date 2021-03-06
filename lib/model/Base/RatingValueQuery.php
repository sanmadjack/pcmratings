<?php

namespace Base;

use \RatingValue as ChildRatingValue;
use \RatingValueQuery as ChildRatingValueQuery;
use \Exception;
use \PDO;
use Map\RatingValueTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'rating_value' table.
 *
 * 
 *
 * @method     ChildRatingValueQuery orderByRatingHeaderId($order = Criteria::ASC) Order by the rating_header_id column
 * @method     ChildRatingValueQuery orderByCategoryOptionId($order = Criteria::ASC) Order by the category_option_id column
 * @method     ChildRatingValueQuery orderByOriginalValue($order = Criteria::ASC) Order by the original_value column
 * @method     ChildRatingValueQuery orderByDoNotScore($order = Criteria::ASC) Order by the do_not_score column
 * @method     ChildRatingValueQuery orderByComments($order = Criteria::ASC) Order by the comments column
 *
 * @method     ChildRatingValueQuery groupByRatingHeaderId() Group by the rating_header_id column
 * @method     ChildRatingValueQuery groupByCategoryOptionId() Group by the category_option_id column
 * @method     ChildRatingValueQuery groupByOriginalValue() Group by the original_value column
 * @method     ChildRatingValueQuery groupByDoNotScore() Group by the do_not_score column
 * @method     ChildRatingValueQuery groupByComments() Group by the comments column
 *
 * @method     ChildRatingValueQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildRatingValueQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildRatingValueQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildRatingValueQuery leftJoinCategoryOption($relationAlias = null) Adds a LEFT JOIN clause to the query using the CategoryOption relation
 * @method     ChildRatingValueQuery rightJoinCategoryOption($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CategoryOption relation
 * @method     ChildRatingValueQuery innerJoinCategoryOption($relationAlias = null) Adds a INNER JOIN clause to the query using the CategoryOption relation
 *
 * @method     ChildRatingValueQuery leftJoinRatingHeader($relationAlias = null) Adds a LEFT JOIN clause to the query using the RatingHeader relation
 * @method     ChildRatingValueQuery rightJoinRatingHeader($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RatingHeader relation
 * @method     ChildRatingValueQuery innerJoinRatingHeader($relationAlias = null) Adds a INNER JOIN clause to the query using the RatingHeader relation
 *
 * @method     \CategoryOptionQuery|\RatingHeaderQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildRatingValue findOne(ConnectionInterface $con = null) Return the first ChildRatingValue matching the query
 * @method     ChildRatingValue findOneOrCreate(ConnectionInterface $con = null) Return the first ChildRatingValue matching the query, or a new ChildRatingValue object populated from the query conditions when no match is found
 *
 * @method     ChildRatingValue findOneByRatingHeaderId(string $rating_header_id) Return the first ChildRatingValue filtered by the rating_header_id column
 * @method     ChildRatingValue findOneByCategoryOptionId(string $category_option_id) Return the first ChildRatingValue filtered by the category_option_id column
 * @method     ChildRatingValue findOneByOriginalValue(int $original_value) Return the first ChildRatingValue filtered by the original_value column
 * @method     ChildRatingValue findOneByDoNotScore(boolean $do_not_score) Return the first ChildRatingValue filtered by the do_not_score column
 * @method     ChildRatingValue findOneByComments(string $comments) Return the first ChildRatingValue filtered by the comments column *

 * @method     ChildRatingValue requirePk($key, ConnectionInterface $con = null) Return the ChildRatingValue by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRatingValue requireOne(ConnectionInterface $con = null) Return the first ChildRatingValue matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildRatingValue requireOneByRatingHeaderId(string $rating_header_id) Return the first ChildRatingValue filtered by the rating_header_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRatingValue requireOneByCategoryOptionId(string $category_option_id) Return the first ChildRatingValue filtered by the category_option_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRatingValue requireOneByOriginalValue(int $original_value) Return the first ChildRatingValue filtered by the original_value column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRatingValue requireOneByDoNotScore(boolean $do_not_score) Return the first ChildRatingValue filtered by the do_not_score column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRatingValue requireOneByComments(string $comments) Return the first ChildRatingValue filtered by the comments column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildRatingValue[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildRatingValue objects based on current ModelCriteria
 * @method     ChildRatingValue[]|ObjectCollection findByRatingHeaderId(string $rating_header_id) Return ChildRatingValue objects filtered by the rating_header_id column
 * @method     ChildRatingValue[]|ObjectCollection findByCategoryOptionId(string $category_option_id) Return ChildRatingValue objects filtered by the category_option_id column
 * @method     ChildRatingValue[]|ObjectCollection findByOriginalValue(int $original_value) Return ChildRatingValue objects filtered by the original_value column
 * @method     ChildRatingValue[]|ObjectCollection findByDoNotScore(boolean $do_not_score) Return ChildRatingValue objects filtered by the do_not_score column
 * @method     ChildRatingValue[]|ObjectCollection findByComments(string $comments) Return ChildRatingValue objects filtered by the comments column
 * @method     ChildRatingValue[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class RatingValueQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\RatingValueQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\RatingValue', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildRatingValueQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildRatingValueQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildRatingValueQuery) {
            return $criteria;
        }
        $query = new ChildRatingValueQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array[$rating_header_id, $category_option_id] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildRatingValue|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RatingValueTableMap::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(RatingValueTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildRatingValue A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT rating_header_id, category_option_id, original_value, do_not_score, comments FROM rating_value WHERE rating_header_id = :p0 AND category_option_id = :p1';
        try {
            $stmt = $con->prepare($sql);            
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);            
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildRatingValue $obj */
            $obj = new ChildRatingValue();
            $obj->hydrate($row);
            RatingValueTableMap::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildRatingValue|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildRatingValueQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(RatingValueTableMap::COL_RATING_HEADER_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(RatingValueTableMap::COL_CATEGORY_OPTION_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildRatingValueQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(RatingValueTableMap::COL_RATING_HEADER_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(RatingValueTableMap::COL_CATEGORY_OPTION_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the rating_header_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRatingHeaderId(1234); // WHERE rating_header_id = 1234
     * $query->filterByRatingHeaderId(array(12, 34)); // WHERE rating_header_id IN (12, 34)
     * $query->filterByRatingHeaderId(array('min' => 12)); // WHERE rating_header_id > 12
     * </code>
     *
     * @see       filterByRatingHeader()
     *
     * @param     mixed $ratingHeaderId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRatingValueQuery The current query, for fluid interface
     */
    public function filterByRatingHeaderId($ratingHeaderId = null, $comparison = null)
    {
        if (is_array($ratingHeaderId)) {
            $useMinMax = false;
            if (isset($ratingHeaderId['min'])) {
                $this->addUsingAlias(RatingValueTableMap::COL_RATING_HEADER_ID, $ratingHeaderId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ratingHeaderId['max'])) {
                $this->addUsingAlias(RatingValueTableMap::COL_RATING_HEADER_ID, $ratingHeaderId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RatingValueTableMap::COL_RATING_HEADER_ID, $ratingHeaderId, $comparison);
    }

    /**
     * Filter the query on the category_option_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCategoryOptionId(1234); // WHERE category_option_id = 1234
     * $query->filterByCategoryOptionId(array(12, 34)); // WHERE category_option_id IN (12, 34)
     * $query->filterByCategoryOptionId(array('min' => 12)); // WHERE category_option_id > 12
     * </code>
     *
     * @see       filterByCategoryOption()
     *
     * @param     mixed $categoryOptionId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRatingValueQuery The current query, for fluid interface
     */
    public function filterByCategoryOptionId($categoryOptionId = null, $comparison = null)
    {
        if (is_array($categoryOptionId)) {
            $useMinMax = false;
            if (isset($categoryOptionId['min'])) {
                $this->addUsingAlias(RatingValueTableMap::COL_CATEGORY_OPTION_ID, $categoryOptionId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($categoryOptionId['max'])) {
                $this->addUsingAlias(RatingValueTableMap::COL_CATEGORY_OPTION_ID, $categoryOptionId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RatingValueTableMap::COL_CATEGORY_OPTION_ID, $categoryOptionId, $comparison);
    }

    /**
     * Filter the query on the original_value column
     *
     * Example usage:
     * <code>
     * $query->filterByOriginalValue(1234); // WHERE original_value = 1234
     * $query->filterByOriginalValue(array(12, 34)); // WHERE original_value IN (12, 34)
     * $query->filterByOriginalValue(array('min' => 12)); // WHERE original_value > 12
     * </code>
     *
     * @param     mixed $originalValue The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRatingValueQuery The current query, for fluid interface
     */
    public function filterByOriginalValue($originalValue = null, $comparison = null)
    {
        if (is_array($originalValue)) {
            $useMinMax = false;
            if (isset($originalValue['min'])) {
                $this->addUsingAlias(RatingValueTableMap::COL_ORIGINAL_VALUE, $originalValue['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($originalValue['max'])) {
                $this->addUsingAlias(RatingValueTableMap::COL_ORIGINAL_VALUE, $originalValue['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RatingValueTableMap::COL_ORIGINAL_VALUE, $originalValue, $comparison);
    }

    /**
     * Filter the query on the do_not_score column
     *
     * Example usage:
     * <code>
     * $query->filterByDoNotScore(true); // WHERE do_not_score = true
     * $query->filterByDoNotScore('yes'); // WHERE do_not_score = true
     * </code>
     *
     * @param     boolean|string $doNotScore The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRatingValueQuery The current query, for fluid interface
     */
    public function filterByDoNotScore($doNotScore = null, $comparison = null)
    {
        if (is_string($doNotScore)) {
            $doNotScore = in_array(strtolower($doNotScore), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RatingValueTableMap::COL_DO_NOT_SCORE, $doNotScore, $comparison);
    }

    /**
     * Filter the query on the comments column
     *
     * Example usage:
     * <code>
     * $query->filterByComments('fooValue');   // WHERE comments = 'fooValue'
     * $query->filterByComments('%fooValue%'); // WHERE comments LIKE '%fooValue%'
     * </code>
     *
     * @param     string $comments The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRatingValueQuery The current query, for fluid interface
     */
    public function filterByComments($comments = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($comments)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $comments)) {
                $comments = str_replace('*', '%', $comments);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RatingValueTableMap::COL_COMMENTS, $comments, $comparison);
    }

    /**
     * Filter the query by a related \CategoryOption object
     *
     * @param \CategoryOption|ObjectCollection $categoryOption The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildRatingValueQuery The current query, for fluid interface
     */
    public function filterByCategoryOption($categoryOption, $comparison = null)
    {
        if ($categoryOption instanceof \CategoryOption) {
            return $this
                ->addUsingAlias(RatingValueTableMap::COL_CATEGORY_OPTION_ID, $categoryOption->getId(), $comparison);
        } elseif ($categoryOption instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RatingValueTableMap::COL_CATEGORY_OPTION_ID, $categoryOption->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCategoryOption() only accepts arguments of type \CategoryOption or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CategoryOption relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildRatingValueQuery The current query, for fluid interface
     */
    public function joinCategoryOption($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CategoryOption');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'CategoryOption');
        }

        return $this;
    }

    /**
     * Use the CategoryOption relation CategoryOption object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CategoryOptionQuery A secondary query class using the current class as primary query
     */
    public function useCategoryOptionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCategoryOption($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CategoryOption', '\CategoryOptionQuery');
    }

    /**
     * Filter the query by a related \RatingHeader object
     *
     * @param \RatingHeader|ObjectCollection $ratingHeader The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildRatingValueQuery The current query, for fluid interface
     */
    public function filterByRatingHeader($ratingHeader, $comparison = null)
    {
        if ($ratingHeader instanceof \RatingHeader) {
            return $this
                ->addUsingAlias(RatingValueTableMap::COL_RATING_HEADER_ID, $ratingHeader->getId(), $comparison);
        } elseif ($ratingHeader instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RatingValueTableMap::COL_RATING_HEADER_ID, $ratingHeader->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRatingHeader() only accepts arguments of type \RatingHeader or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RatingHeader relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildRatingValueQuery The current query, for fluid interface
     */
    public function joinRatingHeader($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RatingHeader');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'RatingHeader');
        }

        return $this;
    }

    /**
     * Use the RatingHeader relation RatingHeader object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \RatingHeaderQuery A secondary query class using the current class as primary query
     */
    public function useRatingHeaderQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRatingHeader($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RatingHeader', '\RatingHeaderQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildRatingValue $ratingValue Object to remove from the list of results
     *
     * @return $this|ChildRatingValueQuery The current query, for fluid interface
     */
    public function prune($ratingValue = null)
    {
        if ($ratingValue) {
            $this->addCond('pruneCond0', $this->getAliasedColName(RatingValueTableMap::COL_RATING_HEADER_ID), $ratingValue->getRatingHeaderId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(RatingValueTableMap::COL_CATEGORY_OPTION_ID), $ratingValue->getCategoryOptionId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the rating_value table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RatingValueTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            RatingValueTableMap::clearInstancePool();
            RatingValueTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RatingValueTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(RatingValueTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            RatingValueTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            RatingValueTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // RatingValueQuery
