<?php
namespace App\Enums;
enum Specialization: string
{
    case CRIMINAL = 'Criminal Law';
    case CIVIL = 'Civil Law';
    case FAMILY = 'Family Law';
    case CORPORATE = 'Corporate Law';
    case TAX = 'Tax Law';
    case INTELLECTUAL_PROPERTY = 'Intellectual Property';
}
