<?php

/** Routes to test the matrix of Criteria definitions and hydration states.
 *
 * PHP Version 5.4
 *
 * @copyright   (c) 2013 ptlis
 * @author      Brian Ridley <ptlis@ptlis.net>
 */

namespace ptlis\DoctrineTestcaseBundle\Controller;

use Doctrine\Common\Collections\Criteria;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/** Routes to test the matrix of Criteria definitions and hydration states.
 */
class TestcaseController extends Controller
{
    /** Criteria sorts by house name field in camel case, this will work if the entity has been hydrated.
     *
     * @return Response
     */
    public function hydratedWorkingAction()
    {
        $streetRepo = $this->getDoctrine()->getRepository('ptlisDoctrineTestcaseBundle:Street');

        $street = $streetRepo->findOneById(1);
        $houseList = $street->getHouses();

        foreach ($houseList as $house) {
            // Some work done here
        }

        $criteria = Criteria::create()
            ->orderBy(['houseName' => Criteria::ASC]);

        $sortedHouseList = $houseList->matching($criteria);

        $responseData = '';
        foreach ($sortedHouseList as $house) {
            $responseData .= $house->getHouseName() . '<br>';
        }

        return new Response($responseData);
    }


    /** Criteria sorts by house name field underscore separated, this will not work if the entity has been hydrated.
     *
     * @return Response
     */
    public function hydratedNotWorkingAction()
    {
        $streetRepo = $this->getDoctrine()->getRepository('ptlisDoctrineTestcaseBundle:Street');

        $street = $streetRepo->findOneById(1);
        $houseList = $street->getHouses();

        foreach ($houseList as $house) {
            // Some work done here
        }

        $criteria = Criteria::create()
            ->orderBy(['house_name' => Criteria::ASC]);

        $sortedHouseList = $houseList->matching($criteria);

        $responseData = '';
        foreach ($sortedHouseList as $house) {
            $responseData .= $house->getHouseName() . '<br>';
        }

        return new Response($responseData);
    }


    /** Criteria sorts by house name field underscore separated, this work if the entity has not been hydrated.
     *
     * @return Response
     */
    public function nonHydratedWorkingAction()
    {
        $streetRepo = $this->getDoctrine()->getRepository('ptlisDoctrineTestcaseBundle:Street');

        $street = $streetRepo->findOneById(1);
        $houseList = $street->getHouses();

        $criteria = Criteria::create()
            ->orderBy(['house_name' => Criteria::ASC]);

        $sortedHouseList = $houseList->matching($criteria);

        $responseData = '';
        foreach ($sortedHouseList as $house) {
            $responseData .= $house->getHouseName() . '<br>';
        }

        return new Response($responseData);
    }


    /** Criteria sorts by house name field in camel case, this will not work as the entity has been hydrated.
     *
     * @return Response
     */
    public function nonHydratedNotWorkingAction()
    {
        $streetRepo = $this->getDoctrine()->getRepository('ptlisDoctrineTestcaseBundle:Street');

        $street = $streetRepo->findOneById(1);
        $houseList = $street->getHouses();

        $criteria = Criteria::create()
            ->orderBy(['houseName' => Criteria::ASC]);

        $sortedHouseList = $houseList->matching($criteria);

        $responseData = '';
        foreach ($sortedHouseList as $house) {
            $responseData .= $house->getHouseName() . '<br>';
        }

        return new Response($responseData);
    }
}
