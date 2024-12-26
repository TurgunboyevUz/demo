<?php

namespace App\Enums;

enum CriteriaEnum: int
{
    case ARTICLE_GLOBAL = 1;
    case ARTICLE_LOCAL = 2;
    case ARTICLE_THESIS_GLOBAL = 3;
    case ARTICLE_THESIS_LOCAL = 4;
    case ARTICLE_SCOPUS = 5;

    case SCHOLARSHIP_INSTITUTE = 6;
    case SCHOLARSHIP_REGION = 7;
    case SCHOLARSHIP_REPUBLIC = 8;

    case INVENTION_INV = 9;
    case INVENTION_DGU = 10;
    case INVENTION_MODEL = 11;

    case STARTUP_STARTUP = 12;
    case STARTUP_CONTEST = 13;

    case GRAND = 14;
    case ECONOMY = 15;

    case OLYMPIC_INSTITUTE = 16;
    case OLYMPIC_REGION = 17;
    case OLYMPIC_REPUBLIC = 18;
}
