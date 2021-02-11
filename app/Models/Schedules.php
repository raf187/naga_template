<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedules extends Model
{
    use HasFactory;

    protected $fillable = [
        'sundayMorning1',
        'sundayMorning2',
        'sundayNigth1',
        'sundayNigth2',
        'sundayOpenMorning',
        'sundayOpenNigth',
        'mondayMorning1',
        'mondayMorning2',
        'mondayNigth1',
        'mondayNigth2',
        'mondayOpenMorning',
        'mondayOpenNigth',
        'tuesdayMorning1',
        'tuesdayMorning2',
        'tuesdayNigth1',
        'tuesdayNigth2',
        'tuesdayOpenMorning',
        'tuesdayOpenNigth',
        'wednesdayMorning1',
        'wednesdayMorning2',
        'wednesdayNigth1',
        'wednesdayNigth2',
        'wednesdayOpenNigth',
        'wednesdayOpenMorning',
        'thursdayMorning1',
        'thursdayMorning2',
        'thursdayNigth1',
        'thursdayNigth2',
        'thursdayOpenMorning',
        'thursdayOpenNigth',
        'fridayMorning1',
        'fridayMorning2',
        'fridayNigth1',
        'fridayNigth2',
        'fridayOpenMorning',
        'fridayOpenNigth',
        'saturdayMorning1',
        'saturdayMorning2',
        'saturdayNigth1',
        'saturdayNigth2',
        'saturdayOpenMorning',
        'saturdayOpenNigth',
    ];
}
