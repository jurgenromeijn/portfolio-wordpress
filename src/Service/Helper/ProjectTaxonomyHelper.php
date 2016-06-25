<?php
/**
 * @author Jurgen Romeijn <jurgen.romeijn@gmail.com>
 */

namespace JurgenRomeijn\Projects\Service\Helper;
use JurgenRomeijn\Projects\Util\SingletonTrait;
use JurgenRomeijn\Projects\Model\Rewrite;
use JurgenRomeijn\Projects\Model\Taxonomy\Taxonomy;

/**
 * This helper contains all functionality to create the taxonomy for a project.
 * @package JurgenRomeijn\Projects\Service\Helper
 */
class ProjectTaxonomyHelper implements ProjectTaxonomyHelperInterface
{

    use SingletonTrait;

    const SLUG = 'projectTaxonomySlug';
    const LABEL = 'projectTaxonomyType';

    private $translationHelper;

    /**
     * Set up all required components for this helper.
     * ProjectTaxonomyHelper constructor.
     */
    private function __construct()
    {
        $this->translationHelper = TranslationHelper::getInstance();
    }

    /**
     * Create the project post type.
     * @return PostType
     */
    public function createTaxonomy()
    {
        $taxonomy = new Taxonomy();

        $taxonomy->setHierarchical(true);
        $taxonomy->setPublic(true);
        $taxonomy->setLabel($this->translationHelper->translate(self::LABEL));
        $taxonomy->setRewrite(new Rewrite($this->translationHelper->translate(self::SLUG), true));

        return $taxonomy;
    }

}
