<?php

namespace Page;

class SearchPage
{
    public $URL = '/search';

    public static $searchField = '#algolia-search-input';
    public static $searchButton = '.oc-mainHeader__navSearch button';
    public static $FilterButton = "//span[contains(text(),'%s')]";
    public static $nextPageButton = '//button[@aria-label="%s"]';
    public static $itemFilter = "//label//span[contains(text(),'%s')]";

    public function search($keyword)
    {
        $I = $this->tester;
        $I->waitForElementVisible(self::$searchButton);
        $I->click(self::$searchButton);
        $I->fillField(self::$searchField, $keyword);
        return $this;
    }

    public function seeLearningContent($courseOrPathName, $keyword)
    {
        $I = $this->tester;
        $I->waitForTextFormattedTranslated("search.result", $keyword);
        $found = false;
        do {
            try {
                $I->waitForText($courseOrPathName, 1);
                $found = true;
            } catch (TimeOutException $e) {
                try {
                    $I->clickOnTranslated(self::$nextPageButton, 'common.button.nextpage');
                } catch (UnknownServerException $e) {
                    $I->fail("Course or path not found before the last page.");
                }
            }
        } while ($found == false);

        return $this;
    }

    public function addCategoryFilter($category = 'all')
    {
        $I = $this->tester;
        $I->waitForElementVisible(sprintf(self::$FilterButton, Translation::get('search.topic.button.filter')));
        $I->click(sprintf(self::$FilterButton, Translation::get('search.topic.button.filter')));
        $I->click(sprintf(self::$itemFilter, Translation::get('search.topic.button.filter.'.$category)));
        $I->click(sprintf(self::$FilterButton, Translation::get('search.topic.button.filter')));
        return $this;
    }
}