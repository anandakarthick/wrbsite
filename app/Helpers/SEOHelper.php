<?php

namespace App\Helpers;

class SEOHelper
{
    /**
     * Get SEO data for a specific page
     */
    public static function getSEO(string $page): array
    {
        $seoData = [
            'home' => [
                'title' => 'KA Software - AI-Powered Software Development Company in Chennai | Mobile Apps, Web Apps, AI Solutions',
                'description' => 'KA Software is a leading AI-powered software development company in Chennai, India. We specialize in mobile app development, web applications, e-commerce platforms, HRMS, CRM systems, and cutting-edge AI/ML solutions. 500+ projects delivered with 98% client satisfaction.',
                'keywords' => 'software development company chennai, mobile app development india, web application development, AI ML solutions, e-commerce development, HRMS software, CRM development, custom software development, flutter app development, react development, python development, artificial intelligence solutions',
                'canonical' => url('/'),
                'og_type' => 'website',
            ],
            'profile' => [
                'title' => 'Company Profile - KA Software | About Us, Services & Expertise',
                'description' => 'Learn about KA Software - A leading AI-powered software development company based in Chennai, India. Founded in 2024, we have delivered 500+ projects with expertise in mobile apps, web applications, AI/ML, e-commerce, HRMS, and CRM solutions.',
                'keywords' => 'KA Software company profile, software company chennai, about KA Software, software development team india, AI development company, mobile app company chennai',
                'canonical' => url('/profile'),
                'og_type' => 'profile',
            ],
            'success-stories' => [
                'title' => 'Success Stories & Case Studies - KA Software | Client Projects & Results',
                'description' => 'Explore KA Software success stories and case studies. See how we helped businesses transform with AI-powered healthcare platforms, e-commerce solutions, HRMS, CRM systems, FinTech apps, and IoT manufacturing solutions.',
                'keywords' => 'software case studies, client success stories, healthcare AI platform, e-commerce success story, HRMS implementation, CRM case study, FinTech app development, IoT manufacturing, software project portfolio',
                'canonical' => url('/success-stories'),
                'og_type' => 'website',
            ],
        ];

        return $seoData[$page] ?? $seoData['home'];
    }

    /**
     * Generate Organization structured data
     */
    public static function getOrganizationSchema(): string
    {
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => 'KA Software',
            'alternateName' => 'KA Software Pvt Ltd',
            'url' => 'https://kasoftware.in',
            'logo' => 'https://kasoftware.in/images/logo.png',
            'description' => 'KA Software is a leading AI-powered software development company specializing in mobile apps, web applications, e-commerce, HRMS, CRM, and AI/ML solutions.',
            'foundingDate' => '2024',
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => '18/15, Subramaniam Street, Rajaji Nagar, Villivakkam Road, Anna Nagar',
                'addressLocality' => 'Chennai',
                'addressRegion' => 'Tamil Nadu',
                'postalCode' => '600049',
                'addressCountry' => 'IN'
            ],
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'telephone' => '+91-8056653499',
                'contactType' => 'sales',
                'email' => 'info@kasoftware.in',
                'availableLanguage' => ['English', 'Tamil', 'Hindi']
            ],
            'sameAs' => [
                'https://www.linkedin.com/company/kasoftware',
                'https://twitter.com/kasoftware'
            ]
        ];
        return json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    }

    /**
     * Generate LocalBusiness structured data
     */
    public static function getLocalBusinessSchema(): string
    {
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'SoftwareCompany',
            'name' => 'KA Software',
            'url' => 'https://kasoftware.in',
            'telephone' => '+91-8056653499',
            'email' => 'info@kasoftware.in',
            'priceRange' => '₹₹₹',
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => '18/15, Subramaniam Street, Rajaji Nagar',
                'addressLocality' => 'Chennai',
                'addressRegion' => 'Tamil Nadu',
                'postalCode' => '600049',
                'addressCountry' => 'IN'
            ],
            'geo' => [
                '@type' => 'GeoCoordinates',
                'latitude' => 13.098115,
                'longitude' => 80.209409
            ],
            'openingHoursSpecification' => [
                [
                    '@type' => 'OpeningHoursSpecification',
                    'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                    'opens' => '09:00',
                    'closes' => '18:00'
                ],
                [
                    '@type' => 'OpeningHoursSpecification',
                    'dayOfWeek' => 'Saturday',
                    'opens' => '10:00',
                    'closes' => '16:00'
                ]
            ],
            'aggregateRating' => [
                '@type' => 'AggregateRating',
                'ratingValue' => '4.9',
                'reviewCount' => '127',
                'bestRating' => '5',
                'worstRating' => '1'
            ]
        ];
        return json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    }

    /**
     * Generate WebSite structured data
     */
    public static function getWebSiteSchema(): string
    {
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => 'KA Software',
            'url' => 'https://kasoftware.in',
            'description' => 'AI-powered software development company',
            'potentialAction' => [
                '@type' => 'SearchAction',
                'target' => 'https://kasoftware.in/search?q={search_term_string}',
                'query-input' => 'required name=search_term_string'
            ]
        ];
        return json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    }

    /**
     * Generate Services structured data
     */
    public static function getServicesSchema(): string
    {
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'ItemList',
            'name' => 'KA Software Services',
            'itemListElement' => [
                ['@type' => 'Service', 'position' => 1, 'name' => 'Mobile App Development', 'description' => 'Native and cross-platform mobile apps using Flutter, React Native, Swift, Kotlin'],
                ['@type' => 'Service', 'position' => 2, 'name' => 'Web Application Development', 'description' => 'Custom web apps using React, Vue.js, Angular, Node.js, Python, Laravel'],
                ['@type' => 'Service', 'position' => 3, 'name' => 'E-commerce Development', 'description' => 'Complete e-commerce solutions with AI-powered recommendations'],
                ['@type' => 'Service', 'position' => 4, 'name' => 'HRMS Solutions', 'description' => 'AI-powered HR management systems'],
                ['@type' => 'Service', 'position' => 5, 'name' => 'CRM Development', 'description' => 'Intelligent CRM with predictive analytics'],
                ['@type' => 'Service', 'position' => 6, 'name' => 'AI/ML Solutions', 'description' => 'Custom AI and Machine Learning solutions']
            ]
        ];
        return json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    }

    /**
     * Generate FAQ structured data
     */
    public static function getFAQSchema(): string
    {
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => [
                [
                    '@type' => 'Question',
                    'name' => 'What services does KA Software offer?',
                    'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'KA Software offers mobile app development, web application development, e-commerce platforms, HRMS solutions, CRM systems, and AI/ML solutions.']
                ],
                [
                    '@type' => 'Question',
                    'name' => 'Where is KA Software located?',
                    'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'KA Software is headquartered in Chennai, Tamil Nadu, India at 18/15, Subramaniam Street, Anna Nagar, Chennai - 600049.']
                ],
                [
                    '@type' => 'Question',
                    'name' => 'How long does software development take?',
                    'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Development timeline varies: simple apps take 2-3 months, web applications 3-4 months, and complex enterprise solutions 6-12 months.']
                ]
            ]
        ];
        return json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    }
}
