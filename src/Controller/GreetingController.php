<?php

declare(strict_types=1);

namespace LRuozzi9\SyliusElasticsearchPlugin\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

final class GreetingController extends AbstractController
{
    public function staticallyGreetAction(?string $name): Response
    {
        return $this->render('@LRuozzi9SyliusElasticsearchPlugin/static_greeting.html.twig', ['greeting' => $this->getGreeting($name)]);
    }

    public function dynamicallyGreetAction(?string $name): Response
    {
        return $this->render('@LRuozzi9SyliusElasticsearchPlugin/dynamic_greeting.html.twig', ['greeting' => $this->getGreeting($name)]);
    }

    private function getGreeting(?string $name): string
    {
        return match ($name) {
            null => 'Hello!',
            'Lionel Richie' => 'Hello, is it me you\'re looking for?',
            default => sprintf('Hello, %s!', $name),
        };
    }
}
