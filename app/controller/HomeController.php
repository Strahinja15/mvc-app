<?php

class HomeController
{

    public function index()
    {

        $data = [
            'title' => 'Home Page',
            'message' => 'Welcome to homepage',
        ];
        render('home/index', $data, 'layout/hero_layout');
    }

    public function about()
    {
        $data = [
            'title' => 'About Page',
            'message' => 'Welcome to about page',
        ];
        render('home/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact Page',
            'message' => 'Welcome to about page',
        ];
        render('home/contact', $data);
    }
}
