<?php

namespace Rofil\Simple\ContentBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Rofil\Simple\ContentBundle\Entity\Information;
use Rofil\Simple\ContentBundle\Entity\News;

class LoadContentData implements FixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$information = new Information;
		$information->setTitle("About Me");
		$information->setBody("<p>Rofilde Hasudungan research are in DNA based Computer</p>");
		$information->setPublished(true);
		$manager->persist($information);
		$news = new news;
		$news->setTitle("About Me");
		$news->setBody("<p>Rofilde Hasudungan research are in DNA based Computer</p>");
		$news->setPublished(true);
		$manager->persist($news);
		$manager->flush();
	}
}