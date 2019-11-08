<?php

use Page\SearchPage;

class BddTester
{
    use _generated\BddTesterActions;

    protected $keyword;

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
        $this->dismissCookieBanner();
    }

    /**
     * @When I filter by :category
     */
    public function iFilterByCategoryFilter($category = 'all')
    {
        $this->visit(SearchPage::class)->addCategoryFilter($category);
    }

    /**
     * @When I search by :keyword
     */
    public function iSearchByKeyword($keyword)
    {
        $this->on(SearchPage::class)->search($keyword);
        $this->keyword = $keyword;
    }

    /**
     * @Then I see the correct :path
     */
    public function iSeeTheCorrectCourseOrPath($path)
    {
        $this->on(SearchPage::class)->seeLearningContent($path, $this->keyword);
    }
}
