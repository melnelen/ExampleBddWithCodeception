<?php

use Page\SearchPage;

class BddTester
{
    use _generated\BddTesterActions;

    protected $searchPage;
    protected $keyword;
    
    protected function _inject(SearchPage $searchPage)
    {
        $this->searchPage = $searchPage;
    }

    /**
     * @Given I am a visitor
     */
    public function iAmAVisitor()
    {
        $this->setLocale('en');
    }

    /**
     * @When I am on the :page page
     */
    public function iAmOnThePage($page)
    {
        $this->amOnPage($page);
    }

    /**
     * @When I filter by :category
     */
    public function iFilterByCategoryFilter($category = 'all')
    {
        $this->searchPage->addCategoryFilter($category);
    }

    /**
     * @When I search by :keyword
     */
    public function iSearchByKeyword($keyword)
    {
        $this->searchPage->search($keyword);
        $this->keyword = $keyword;
    }

    /**
     * @Then I see the correct :path
     */
    public function iSeeTheCorrectCourseOrPath($path)
    {
        $this->searchPage->seeLearningContent($path, $this->keyword);
    }
}
