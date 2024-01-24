<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('menu_helper'))
{
    function menuData(){
      $arrContextOptions=array(
        "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        ),
      );  
      // $menuData = file_get_contents(base_url()."assets/data/menu.json", false, stream_context_create($arrContextOptions));

    

$jayParsedAry = [
    "navBar" => [
        [
            "name" => "Home",
            "link" => true,
            "display" => true,
            "redirect" => "index",
        ],
        [
            "name" => "About Us",
            "link" => false,
            "display" => true,
            "childrenDisplay" => true,
            "subchildrenDisplay" => true,
            "children" => [
                [
                    "name" => "Institute",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Vision and Mission",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Administration",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Governing bodies",
                    "link" => true,
                    "display" => true,
                    "redirect" => "Executive Committee of MTES",
                    "childrenDisplay" => true,
                    "subchildrenDisplay" => true,
                    "children" => [
                        [
                            "name" => "Executive Committee of MTES",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Board Of Governors of MCE",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Proceedings",
                            "link" => true,
                            "display" => true,
                        ],
                    ],
                ],
                [
                    "name" => "Messages",
                    "link" => true,
                    "display" => true,
                    "redirect" => "Chairman Message",
                    "childrenDisplay" => true,
                    "subchildrenDisplay" => true,
                    "children" => [
                        [
                            "name" => "Chairman Message",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Vicechairman Message",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Secretary Message",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Treasurer Message",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Principal Message",
                            "link" => true,
                            "display" => true,
                        ],
                    ],
                ],
                [
                    "name" => "Other Committee",
                    "link" => true,
                    "display" => true,
                    "redirect" => "Academic Council",
                    "childrenDisplay" => true,
                    "subchildrenDisplay" => true,
                    "children" => [
                        [
                            "name" => "Academic Council",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Board Of Studies",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Equivalence Committee",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Anti-Ragging Committee",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Campus Disciplinary committee",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Grievance Redressal Committee",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Standing Disciplinary Action Committee",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "College Internal Complaints Committee",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "IQAC",
                            "link" => true,
                            "display" => false,
                            "childrenDisplay" => true,
                            "subchildrenDisplay" => true,
                            "children" => [
                                [
                                    "name" => "IQAC MOMS",
                                    "link" => true,
                                    "display" => true,
                                ],
                                [
                                    "name" => "AQAR Reports",
                                    "link" => true,
                                    "display" => true,
                                ],
                                [
                                    "name" => "AQAR Documents",
                                    "link" => true,
                                    "display" => true,
                                ],
                            ],
                        ],
                        [
                            "name" => "SC ST OBC Committee",
                            "link" => true,
                            "display" => true,
                        ],
                    ],
                ],
            ],
        ],
        [
            "name" => "Admissions",
            "link" => false,
            "display" => true,
            "childrenDisplay" => true,
            "subchildrenDisplay" => true,
            "children" => [
                [
                    "name" => "Programs Offered",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Research Programs",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Student Affairs",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Scholarships",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Prospectus",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Enquiry",
                    "link" => true,
                    "display" => true,
                ],
            ],
        ],
        [
            "name" => "Academics",
            "link" => false,
            "display" => true,
            "childrenDisplay" => true,
            "subchildrenDisplay" => true,
            "children" => [
                [
                    "name" => "Civil Engineering",
                    "link" => true,
                    "display" => true,
                    "childrenDisplay" => true,
                    "subchildrenDisplay" => false,
                    "department" => true,
                    "redirect" => "Overview",
                    "children" => [
                        [
                            "name" => "Overview",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Committees",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Programmes",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Syllabus",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Learning Resources",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Faculty",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Staff",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Facilities",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Alumni",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Research",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Publications",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Achievements",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Activities",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Placements",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Mandatory Disclosures",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Newsletters",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "News and Events",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "CIE Seat Allotment",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Time Table-Calendar Of Events",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Gallery",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Contacts",
                            "link" => true,
                            "display" => true,
                        ],
                    ],
                ],
                [
                    "name" => "Mechanical Engineering",
                    "link" => true,
                    "display" => true,
                    "childrenDisplay" => true,
                    "subchildrenDisplay" => false,
                    "department" => true,
                    "redirect" => "Overview",
                    "children" => [
                        [
                            "name" => "Overview",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Committees",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Programmes",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Syllabus",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Learning Resources",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Faculty",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Staff",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Facilities",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Alumni",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Research",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Publications",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Achievements",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Activities",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Placements",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Mandatory Disclosures",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Newsletters",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "News and Events",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "CIE Seat Allotment",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Time Table Calendar Of Events",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Gallery",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Contacts",
                            "link" => true,
                            "display" => true,
                        ],
                    ],
                ],
                [
                    "name" => "Electrical and Electronics Engineering",
                    "link" => true,
                    "display" => true,
                    "childrenDisplay" => true,
                    "subchildrenDisplay" => false,
                    "department" => true,
                    "redirect" => "Overview",
                    "children" => [
                        [
                            "name" => "Overview",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Committees",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Programmes",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Syllabus",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Learning Resources",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Faculty",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Staff",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Facilities",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Alumni",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Research",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Publications",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Achievements",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Activities",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Placements",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Mandatory Disclosures",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Newsletters",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "News and Events",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "CIE Seat Allotment",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Time Table Calendar Of Events",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Gallery",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Contacts",
                            "link" => true,
                            "display" => true,
                        ],
                    ],
                ],
                [
                    "name" => "Electronics and Communication Engineering",
                    "link" => true,
                    "display" => true,
                    "childrenDisplay" => true,
                    "subchildrenDisplay" => false,
                    "department" => true,
                    "redirect" => "Overview",
                    "children" => [
                        [
                            "name" => "Overview",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Committees",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Programmes",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Syllabus",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Learning Resources",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Faculty",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Staff",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Facilities",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Alumni",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Research",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Publications",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Achievements",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Activities",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Placements",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Mandatory Disclosures",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Newsletters",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "News and Events",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "CIE Seat Allotment",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Time Table Calendar Of Events",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Gallery",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Contacts",
                            "link" => true,
                            "display" => true,
                        ],
                    ],
                ],
                [
                    "name" => "Automobile Engineering",
                    "link" => true,
                    "display" => false,
                    "childrenDisplay" => true,
                    "subchildrenDisplay" => false,
                    "department" => true,
                    "redirect" => "Overview",
                    "children" => [
                        [
                            "name" => "Overview",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Committees",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Programmes",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Syllabus",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Learning Resources",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Faculty",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Staff",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Facilities",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Alumni",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Research",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Publications",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Achievements",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Activities",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Placements",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Mandatory Disclosures",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Newsletters",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "News and Events",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "CIE Seat Allotment",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Time Table Calendar Of Events",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Gallery",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Contacts",
                            "link" => true,
                            "display" => true,
                        ],
                    ],
                ],
                [
                    "name" => "Computer Science and Engineering",
                    "link" => true,
                    "display" => true,
                    "childrenDisplay" => true,
                    "subchildrenDisplay" => false,
                    "department" => true,
                    "redirect" => "Overview",
                    "children" => [
                        [
                            "name" => "Overview",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Committees",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Programmes",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Syllabus",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Learning Resources",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Faculty",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Staff",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Facilities",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Alumni",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Research",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Publications",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Achievements",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Activities",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Placements",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Mandatory Disclosures",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Newsletters",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "News and Events",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "CIE Seat Allotment",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Time Table Calendar Of Events",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Gallery",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Contacts",
                            "link" => true,
                            "display" => true,
                        ],
                    ],
                ],
                [
                    "name" => "Electronics and Instrumentation Engineering",
                    "link" => true,
                    "display" => true,
                    "childrenDisplay" => true,
                    "subchildrenDisplay" => false,
                    "department" => true,
                    "redirect" => "Overview",
                    "children" => [
                        [
                            "name" => "Overview",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Committees",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Programmes",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Syllabus",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Learning Resources",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Faculty",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Staff",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Facilities",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Alumni",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Research",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Publications",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Achievements",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Activities",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Placements",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Mandatory Disclosures",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Newsletters",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "News and Events",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "CIE Seat Allotment",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Time Table Calendar Of Events",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Gallery",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Contacts",
                            "link" => true,
                            "display" => true,
                        ],
                    ],
                ],
                [
                    "name" => "Information Science and Engineering",
                    "link" => true,
                    "display" => true,
                    "childrenDisplay" => true,
                    "subchildrenDisplay" => false,
                    "department" => true,
                    "redirect" => "Overview",
                    "children" => [
                        [
                            "name" => "Overview",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Committees",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Programmes",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Syllabus",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Learning Resources",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Faculty",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Staff",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Facilities",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Alumni",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Research",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Publications",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Achievements",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Activities",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Placements",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Mandatory Disclosures",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Newsletters",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "News and Events",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "CIE Seat Allotment",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Time Table Calendar Of Events",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Gallery",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Contacts",
                            "link" => true,
                            "display" => true,
                        ],
                    ],
                ],
                [
                    "name" => "Artificial Intelligence and Machine Learning",
                    "link" => true,
                    "display" => true,
                    "childrenDisplay" => true,
                    "subchildrenDisplay" => false,
                    "department" => true,
                    "redirect" => "Overview",
                    "children" => [
                        [
                            "name" => "Overview",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Committees",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Programmes",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Syllabus",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Learning Resources",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Faculty",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Staff",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Facilities",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Alumni",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Research",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Publications",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Achievements",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Activities",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Placements",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Mandatory Disclosures",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Newsletters",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "News and Events",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "CIE Seat Allotment",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Time Table Calendar Of Events",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Gallery",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Contacts",
                            "link" => true,
                            "display" => true,
                        ],
                    ],
                ],
                [
                    "name" => "Computer Science and Business Systems",
                    "link" => true,
                    "display" => true,
                    "childrenDisplay" => true,
                    "subchildrenDisplay" => false,
                    "department" => true,
                    "redirect" => "Overview",
                    "children" => [
                        [
                            "name" => "Overview",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Committees",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Programmes",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Syllabus",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Learning Resources",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Faculty",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Staff",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Facilities",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Alumni",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Research",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Publications",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Achievements",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Activities",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Placements",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Mandatory Disclosures",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Newsletters",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "News and Events",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "CIE Seat Allotment",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Time Table Calendar Of Events",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Gallery",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Contacts",
                            "link" => true,
                            "display" => true,
                        ],
                    ],
                ],
                [
                    "name" => "Physics",
                    "link" => true,
                    "display" => true,
                    "childrenDisplay" => true,
                    "subchildrenDisplay" => false,
                    "department" => true,
                    "redirect" => "Overview",
                    "children" => [
                        [
                            "name" => "Overview",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Committees",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Programmes",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Syllabus",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Learning Resources",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Faculty",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Staff",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Facilities",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Alumni",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Research",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Publications",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Achievements",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Activities",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Placements",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Mandatory Disclosures",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Newsletters",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "News and Events",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Time Table Calendar Of Events",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Gallery",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Contacts",
                            "link" => true,
                            "display" => true,
                        ],
                    ],
                ],
                [
                    "name" => "Chemistry",
                    "link" => true,
                    "display" => true,
                    "childrenDisplay" => true,
                    "subchildrenDisplay" => false,
                    "department" => true,
                    "redirect" => "Overview",
                    "children" => [
                        [
                            "name" => "Overview",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Committees",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Programmes",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Syllabus",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Learning Resources",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Faculty",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Staff",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Facilities",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Alumni",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Research",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Publications",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Achievements",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Activities",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Placements",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Mandatory Disclosures",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Newsletters",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "News and Events",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Time Table Calendar Of Events",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Gallery",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Contacts",
                            "link" => true,
                            "display" => true,
                        ],
                    ],
                ],
                [
                    "name" => "Mathematics",
                    "link" => true,
                    "display" => true,
                    "childrenDisplay" => true,
                    "subchildrenDisplay" => false,
                    "department" => true,
                    "redirect" => "Overview",
                    "children" => [
                        [
                            "name" => "Overview",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Committees",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Programmes",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Syllabus",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Learning Resources",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Faculty",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Staff",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Facilities",
                            "link" => true,
                            "display" => true,
                        ],
                        // [
                        //     "name" => "Alumni",
                        //     "link" => true,
                        //     "display" => true,
                        // ],
                        [
                            "name" => "Research",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Publications",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Achievements",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Activities",
                            "link" => true,
                            "display" => true,
                        ],
                        // [
                        //     "name" => "Placements",
                        //     "link" => true,
                        //     "display" => true,
                        // ],
                        [
                            "name" => "Mandatory Disclosures",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Newsletters",
                            "link" => true,
                            "display" => true,
                        ],
                        // [
                        //     "name" => "News and Events",
                        //     "link" => true,
                        //     "display" => true,
                        // ],
                        [
                            "name" => "Time Table Calendar Of Events",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Gallery",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Contacts",
                            "link" => true,
                            "display" => true,
                        ],
                    ],
                ],
                [
                    "name" => "Mandatory Disclosure",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Researchs",
                    "link" => true,
                    "display" => true,
                ],
            ],
        ],
        [
            "name" => "Examination",
            "link" => false,
            "display" => true,
            "childrenDisplay" => true,
            "subchildrenDisplay" => true,
            "children" => [
                [
                    "name" => "Process",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Circulars",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Seat Allotment",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Results",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Malpractice Enquiry Committee",
                    "link" => true,
                    "display" => true,
                ],
            ],
        ],
        [
            "name" => "Placements",
            "link" => true,
            "display" => true,
            "redirect" => "Placement Overview",
            "childrenDisplay" => true,
            "subchildrenDisplay" => true,
            "children" => [
                [
                    "name" => "Placement Overview",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Testimonials",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Our Recruiters",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Placement Records",
                    "link" => true,
                    "display" => true,
                ],
            ],
        ],
        [
            "name" => "Other Wings",
            "link" => false,
            "display" => true,
            "childrenDisplay" => true,
            "subchildrenDisplay" => true,
            "subsubchildrenDisplay" => true,
            "children" => [
                [
                    "name" => "ME-RIISE",
                    "link" => true,
                    "display" => false,
                    "navigate" => "https://www.meriise.org/",
                ],
                [
                    "name" => "Make In MCE",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Facilities",
                    "link" => true,
                    "display" => true,
                    "redirect" => "Library",
                    "childrenDisplay" => true,
                    "subchildrenDisplay" => true,
                    "children" => [
                        [
                            "name" => "Library",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Sports",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Hostel",
                            "link" => true,
                            "display" => true,
                            "redirect" => "Hostel",
                            "childrenDisplay" => true,
                            "subchildrenDisplay" => true,
                            "subsubchildrenDisplay" => true,
                            "children" => [
                                [
                                    "name" => "Boys Hostel",
                                    "link" => true,
                                    "display" => true,
                                ],
                                [
                                    "name" => "Girls Hostel",
                                    "link" => true,
                                    "display" => true,
                                ],
                            ],
                        ],
                        [
                            "name" => "Transport",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Clubs",
                            "link" => true,
                            "display" => true,
                            "redirect" => "Clubs",
                            "childrenDisplay" => true,
                            "subchildrenDisplay" => true,
                            "subsubchildrenDisplay" => true,
                            "children" => [
                                [
                                    "name" => "Eco Club",
                                    "link" => true,
                                    "display" => true,
                                ],
                                [
                                    "name" => "Leo Club",
                                    "link" => true,
                                    "display" => true,
                                ],
                                [
                                    "name" => "Literary Club",
                                    "link" => true,
                                    "display" => true,
                                ],
                                [
                                    "name" => "Rotaract Club",
                                    "link" => true,
                                    "display" => true,
                                ],
                                [
                                    "name" => "Devops Club",
                                    "link" => true,
                                    "display" => true,
                                ],
                                [
                                    "name" => "Spicmacacy",
                                    "link" => true,
                                    "display" => true,
                                ],
                                [
                                    "name" => "Science Association",
                                    "link" => true,
                                    "display" => true,
                                ],
                                [
                                    "name" => "Technical Club",
                                    "link" => true,
                                    "display" => true,
                                ],
                                [
                                    "name" => "Department Association",
                                    "link" => true,
                                    "display" => true,
                                ],
                                [
                                    "name" => "FOSS Club",
                                    "link" => true,
                                    "display" => true,
                                ],
                            ],
                        ],
                        [
                            "name" => "Others",
                            "link" => true,
                            "display" => true,
                        ],
                    ],
                ],
                [
                    "name" => "Network Control Centre",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "National Service Scheme",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "MOU",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Faculty Profile IRINS",
                    "link" => true,
                    "display" => true,
                    "navigate" => "https://mcehassan.irins.org/",
                ],
                [
                    "name" => "Spiritual Enclave",
                    "link" => true,
                    "display" => true,
                ],
            ],
        ],
        [
            "name" => "Government Initiative",
            "link" => false,
            "display" => true,
            "childrenDisplay" => true,
            "subchildrenDisplay" => true,
            "children" => [
                [
                    "name" => "TEQIP",
                    "link" => true,
                    "display" => true,
                    "redirect" => "TEQIP-I",
                    "childrenDisplay" => true,
                    "subchildrenDisplay" => true,
                    "children" => [
                        [
                            "name" => "TEQIP-I",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "TEQIP-II",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "TEQIP-III",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Proceedings",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Gallery",
                            "redirect" => "TEQIP Gallery",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Contact",
                            "redirect" => "TEQIP Contact",
                            "link" => true,
                            "display" => true,
                        ],
                    ],
                ],
                [
                    "name" => "Institution's Innovation Council",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Unnat Bharath Abhiyan",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "New Age Innovation Network",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Startup Karnataka",
                    "link" => true,
                    "display" => true,
                ],
            ],
        ],
        [
            "name" => "AICTE IDEA-Lab",
            "link" => false,
            "display" => true,
            "childrenDisplay" => true,
            "subchildrenDisplay" => true,
            "children" => [
                [
                    "name" => "Home",
                    "redirect" => "AICTE IDEA-LAB",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "People",
                    "redirect" => "AICTE People",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Equipments",
                    "redirect" => "AICTE Equipments",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Events",
                    "redirect" => "AICTE Events",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Gallery",
                    "redirect" => "AICTE Gallery",
                    "link" => true,
                    "display" => true,
                ],
            ],
        ],
        [
            "name" => "ME-RIISE",
            "link" => true,
            "display" => true,
            "redirect" => "ME_RIIISE",
            "childrenDisplay" => true,
            "subchildrenDisplay" => true,
            "children" => [
                [
                    "name" => "Home",
                    "redirect" => "ME_RIIISE",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "About-Us",
                    "redirect" => "MERIISE_About",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Team",
                    "link" => true,
                    "display" => true,
                    "redirect" => "MERIISE_Faculty",
                    "childrenDisplay" => true,
                    "subchildrenDisplay" => true,
                    "children" => [
                        [
                            "name" => "Faculty",
                            "redirect" => "MERIISE_Faculty",
                            "link" => true,
                            "display" => true,
                        ],
                        [
                            "name" => "Student Members",
                            "link" => true,
                            "display" => true,
                        ],
                    ],
                ],
                [
                    "name" => "MHRD-IIC",
                    "redirect" => "MHRD_IIIC",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "NAIN",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "UBA",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Infrastructure",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Startups",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Events",
                    "redirect" => "MERIISE_Events",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Collaborations",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Documents",
                    "redirect" => "Document",
                    "link" => true,
                    "display" => true,
                ],
            ],
        ],
        [
            "name" => "IQAC",
            "link" => true,
            "display" => true,
            "childrenDisplay" => true,
            "subchildrenDisplay" => true,
            "children" => [
                [
                    "name" => "IQAC MOMS",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "AQAR Reports",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Curricular Aspects",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Teaching Learning and Evaluation",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Research, Innovations and Extension",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Infrastructure and Learning Resources",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Student Support and Progression",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Governances, Leadership and Management",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Institutional Values and Best Practices",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "AQAR Documents",
                    "link" => true,
                    "display" => true,
                ],
            ],
        ],
        [
            "name" => "NAAC",
            "link" => true,
            "display" => true,
            "redirect" => "DVV Clarification",
            "childrenDisplay" => true,
            "subchildrenDisplay" => true,
            "children" => [
                [
                    "name" => "DVV Clarification-1",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "DVV Clarification-2",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Extended Profile",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Curricular Aspects",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Teaching Learning and Evaluation",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Research, Innovations and Extension",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Infrastructure and Learning Resources",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Student Support and Progression",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Governances, Leadership and Management",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Institutional Values and Best Practices",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Undertaking",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Quality Initiatives",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "Qualitative Matrics",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "NAAC Certificate",
                    "link" => true,
                    "display" => true,
                ],
                [
                    "name" => "SSR",
                    "link" => true,
                    "display" => true,
                ]
              
            ],
        ],
    ],
    "topBar" => [
        [
            "name" => "Online Payment",
            "link" => true,
            "display" => true,
        ],
        [
            "name" => "MoU",
            "link" => true,
            "display" => true,
        ],
        [
            "name" => "Alumni",
            "link" => true,
            "display" => true,
        ],
        [
            "name" => "Media",
            "link" => true,
            "display" => true,
        ],
        [
            "name" => "Gallery",
            "link" => true,
            "display" => true,
        ],
        [
            "name" => "Contact",
            "link" => true,
            "display" => true,
        ],
    ],
    "footerLinks1" => [
        [
            "name" => "UGC",
            "link" => true,
            "display" => true,
        ],
        [
            "name" => "AICTE",
            "link" => true,
            "display" => true,
        ],
        [
            "name" => "NAAC",
            "link" => true,
            "display" => true,
        ],
        [
            "name" => "NBA",
            "link" => true,
            "display" => true,
        ],
        [
            "name" => "NIRF",
            "link" => true,
            "display" => true,
        ],
        [
            "name" => "IQAC",
            "link" => true,
            "display" => true,
        ],
        [
            "name" => "TEQIP",
            "link" => true,
            "display" => true,
        ],
        [
            "name" => "Affiliation from VTU",
            "link" => true,
            "display" => true,
        ],
    ],
    "footerLinks2" => [
        [
            "name" => "Library",
            "redirect" => "About Library",
            "link" => true,
            "display" => true,
        ],
        [
            "name" => "Hostel",
            "link" => true,
            "display" => true,
        ],
        [
            "name" => "Sports",
            "link" => true,
            "display" => true,
        ],
        [
            "name" => "NSS",
            "link" => true,
            "display" => true,
        ],
        [
            "name" => "Media",
            "link" => true,
            "display" => true,
        ],
        [
            "name" => "Gallery",
            "link" => true,
            "display" => true,
        ],
        [
            "name" => "R & D Cell",
            "redirect" => "R and D Cell",
            "link" => true,
            "display" => true,
        ],
        [
            "name" => "Placements",
            "redirect" => "About Placement Cell",
            "link" => true,
            "display" => true,
        ],
    ],
    "footerLinks3" => [
        [
            "name" => "Programs Offered",
            "link" => true,
            "display" => true,
        ],
        [
            "name" => "Eligibility Criteria",
            "link" => true,
            "display" => true,
        ],
        [
            "name" => "Fee Structure",
            "link" => true,
            "display" => true,
        ],
        [
            "name" => "Online Grievance Redressal System",
            "link" => true,
            "display" => true,
        ],
        [
            "name" => "Student Feedback",
            "link" => true,
            "display" => true,
        ],
        [
            "name" => "Exam Circulars",
            "link" => true,
            "display" => true,
        ],
        [
            "name" => "Stake Holders Perception",
            "link" => true,
            "display" => true,
        ],
    ],
    "footerLinks4" => [
        [
            "name" => "Calendar of Events",
            "link" => true,
            "display" => true,
        ],
        [
            "name" => "Monthly Activities",
            "link" => true,
            "display" => true,
        ],
        [
            "name" => "Scholarships",
            "link" => true,
            "display" => true,
        ],
        [
            "name" => "Air Quality at the Campus",
            "link" => true,
            "display" => true,
        ],
        [
            "name" => "Contacts",
            "link" => true,
            "display" => true,
        ],
    ],
];
$menuData=json_encode($jayParsedAry);
      return $menuData;
    }

    function menu(){  
        $menuData = menuData();
        return $menu = json_decode($menuData);
    }
     
    function subMenu($parent = ''){
        $menuData = menuData();
        $menu = json_decode($menuData);
        $navBar = $menu->navBar;
        $subMenu = null;
        
        foreach($navBar as $navBar){
         if (strcmp($navBar->name, $parent) == 0) {
             $subMenu = $navBar;
         }
         if( isset($navBar->children)){
            $children = $navBar->children;
            foreach($children as $children){
              if (strcmp($children->name, $parent) == 0) {
                $subMenu = $children;
              }   
            }
         }
        }
        return $subMenu;
    }
    
    function sideMenu($parent = '', $activeMenu = null, $color=null){
        $menuData = menuData();
        $menu = json_decode($menuData);
        $navBar = $menu->navBar;
        $subMenu = null;
        
        foreach($navBar as $navBar){
         if (strcmp($navBar->name, $parent) == 0) {
             $subMenu = $navBar;
         }
         if( isset($navBar->children)){
            $children = $navBar->children;
            foreach($children as $children){
              if (strcmp($children->name, $parent) == 0) {
                $subMenu = $children;
              }   
            }
         }
        }
        
        $return = '<ul class="service__sidebar--widget__links">';
        if( isset($subMenu->children) && $subMenu->childrenDisplay){
		    $sideMenu =  $subMenu->children;
			foreach($sideMenu as $sideMenu){
        $active = null;
        if (strcmp($sideMenu->name, $activeMenu) == 0) {
          $active = $color;   
      }
			    if($sideMenu->display){
              $return .= '<li class=" '.$active.'">'; 
              if(isset($sideMenu->navigate)){
                $active = null;
                $return .= anchor($sideMenu->navigate, $sideMenu->name.'<i class="fa fa-angle-right"></i>', 'class=" '.$active.'" target="_blank"');
              }else{
                if(isset($sideMenu->redirect)){
                  $childrenLink = preg_replace('/\s+/', '-', $sideMenu->redirect);
                }else{
                  $childrenLink = preg_replace('/\s+/', '-', $sideMenu->name);
                }
                                                                                            
                $childrenLink = preg_replace('/[^A-Za-z0-9\-]/', '', $childrenLink);
                $active = null;
               
                $return .= anchor("home/".$childrenLink, $sideMenu->name.'<i class="fa fa-angle-right"></i>', 'class=" '.$active.'"');
              }
        			$return .= '</li>';
			    }
		    }
        }
        $return .= "</ul>";
        
        return $return;
    }
    
    function sideMenuDept($parent = '', $activeMenu = null, $color=null){
        $menuData = menuData();
        $menu = json_decode($menuData);
        $navBar = $menu->navBar;
        $subMenu = null;
        
        foreach($navBar as $navBar){
        if (strcmp($navBar->name, $parent) == 0) {
            $subMenu = $navBar;
        }
        
        if( isset($navBar->children)){
            $children = $navBar->children;
            foreach($children as $children){
              if (strcmp($children->name, $parent) == 0) {
                $subMenu = $children;
              }   
            }
        }
        }
        
        $return = '<ul class="service__sidebar--widget__links">';
        if( isset($subMenu->children) && $subMenu->childrenDisplay){
        $sideMenu =  $subMenu->children;
      foreach($sideMenu as $sideMenu){
          if($sideMenu->display){
            $active = null;
            if (strcmp($sideMenu->name, $activeMenu) == 0) {
                $active = $color;   
            }
              $return .= '<li class="'.$active.'">'; 
              if(isset($sideMenu->navigate)){
                $active = null;
                $return .= anchor($sideMenu->navigate, $sideMenu->name.'<i class="fa fa-angle-right"></i>', 'class="'.$active.'" target="_blank"');
              }else{
                if(isset($sideMenu->redirect)){
                  $childrenLink = preg_replace('/\s+/', '-', $sideMenu->redirect);
                }else{
                  // $childrenLink = preg_replace('/\s+/', '-', $parent.' '.$sideMenu->name);
                  $childrenLink = preg_replace('/\s+/', '-', $sideMenu->name.'/'.$parent);
                }
                                                                                      
                $childrenLink = preg_replace('/[^A-Za-z0-9\-]/', '/', $childrenLink);
                // echo   $childrenLink;
                // die();   
                $return .= anchor("home/".$childrenLink, $sideMenu->name.'<i class="fa fa-angle-right"></i>', 'class="'.$active.'"');
              }
              $return .= '</li>';
          }
        }
        }
        $return .= "</ul>";
        
        return $return;
    }

    function sideMenuA($parent = '', $activeMenu = null){
        $menuData = menuData();
        $menu = json_decode($menuData);
        $navBar = $menu->navBar;
        $subMenu = null;
        
        foreach($navBar as $navBar){
         if (strcmp($navBar->name, $parent) == 0) {
             $subMenu = $navBar;
         }
         if( isset($navBar->children)){
            $children = $navBar->children;
            foreach($children as $children){
              if (strcmp($children->name, $parent) == 0) {
                $subMenu = $children;
              }   
            }
         }
        }
        
        $return = '<ul class="nav nav-list flex-column mb-5">';
        if( isset($subMenu->children) && $subMenu->childrenDisplay){
		    $sideMenu =  $subMenu->children;
			foreach($sideMenu as $sideMenu){
    		    $childrenLink = preg_replace('/\s+/', '-', $parent.' '.$sideMenu->name);
    			$childrenLink = preg_replace('/[^A-Za-z0-9\-]/', '', $childrenLink);
    			$active = null;
    			if (strcmp($sideMenu->name, $activeMenu) == 0) {
    			    $active = 'active';   
    			}
    			$return .= '<li class="nav-item">';
                $return .= anchor("home/".$childrenLink, $sideMenu->name, 'class="nav-link '.$active.'"');
    			$return .= '</li>';
		    }
        }
        $return .= "</ul>";
        
        return $return;
    }
    
    function sideBar($mainMenu = '', $parentMenu = false, $activeMenu = null){
        $return = null;
        if($parentMenu){
            $return .= '<div class="service__sidebar--widget bg-white-f7 mb-30">';
            $return .= '<h4 class="service__sidebar--widget__title line-bottom">'.$parentMenu.'</h4>';
            $subMenu = sideMenu($parentMenu, $activeMenu, 'active');
            $return .= $subMenu;
            $return .= '</div>';    
            $activeMenu = $parentMenu;
        }
        $return .= '<div class="service__sidebar--widget bg-white-f7 mb-30">';
        $return .= '<h4 class="service__sidebar--widget__title line-bottom">'.$mainMenu.'</h4>';
        $mainBar = sideMenu($mainMenu, $activeMenu, 'active');
        $return .= $mainBar;
        $return .= '</div>';
        return $return;
    }
    
  function departmentSideBar($mainMenu = '', $parentMenu = false, $activeMenu = null){
      $return = null;
      if($parentMenu){
          $return .= '<div class="service__sidebar--widget bg-white-f7 mb-30">';
            $return .= '<h4 class="service__sidebar--widget__title line-bottom">'.$parentMenu.'</h4>';
          $subMenu = sideMenuDept($parentMenu, $activeMenu, 'active');
          $return .= $subMenu;
          $return .= '</div>';    
          $activeMenu = $parentMenu;
      }
      // $return .= '<div class="widget">';
      // $return .= '<h5 class="widget-title line-bottom">'.$mainMenu.'</h5>';
      // $mainBar = sideMenuDept($mainMenu, $activeMenu, 'activeBlue');
      // $return .= $mainBar;
      // $return .= '</div>';
      return $return;
  }

    function breadCrumb($mainMenu = '', $parentMenu = false, $activeMenu = null, $page_title = null){
        $return = null;
        
        $return = '<section class="page-header page-header-classic">';
		    $return .= '<div class="container">';
		    $return .= '<div class="row">';
        $return .= '<div class="col p-static">';
        if(isset($page_title)){
		      $activeMenu = $page_title;
		    }
        $return .= '<h1 data-title-border>'.$activeMenu.'</h1>';
        $return .= '</div>';
        $return .= '</div>';
        $return .= '<div class="row">';
        $return .= '<div class="col">';
        $return .= '<ul class="breadcrumb">';
        $return .= '<li>'.anchor('home','Home').'</li>';
        $return .= '<li class="active">'.$mainMenu.'</li>';
        if($parentMenu){
          $return .= '<li class="active">'.$parentMenu.'</li>';
        }
        $return .= '</ul>';
        $return .= '</div>';
        $return .= '</div>';
        $return .= '</div>';
        $return .= '</section>';
		    return $return;	
    }

    function readFolder($dir){
        $result = array(); 
        $cdir = scandir($dir); 
           foreach ($cdir as $key => $value) 
           { 
              if (!in_array($value,array(".","..","error log"))) 
              { 
                 if (is_dir($dir . DIRECTORY_SEPARATOR . $value)) 
                 { 
                    $result[$value] = readFolder($dir . DIRECTORY_SEPARATOR . $value); 
                 } 
                 else 
                 { 
                    $result[] = $value; 
                 } 
              } 
           } 
           
        return $result; 
    }

    function getSyllabus($dir, $label){
        if (is_dir($dir)){
            
          if(substr($dir, 0, 2) == "./") $DownloadURL = substr($dir, 2);

          $Files = readFolder($dir);
          $Files = array_reverse($Files);
          $i=1;
          echo '<section class="toggle active">';
          echo '<label>'.$label.'</label>';
          echo '<div class="toggle-content" style="display: block;">';
          echo '<table id="" class="table table-hover" style="width:100%">
                <thead>
                  <tr>
                    <th width="5%">#</th>
                    <th width="75%">Syllabus Name</th>
                    <th width="20%">Download</th>
                  </tr>
                </thead><tbody>';
          foreach($Files as $Files_Key => $Files_Value)
           {
                echo "<tr>";
                if(is_array($Files_Value)){
                  echo "<th colspan=3>".$Files_Key."</th>";
                  $Files_Value = array_reverse($Files_Value);  
                  $j = 1;                                          
                  foreach($Files_Value as $Files_Value){
                    $Files_Label = preg_replace('/\\.[^.\\s]{3,4}$/', '', $Files_Value);
                    $Files_Label = str_replace("_", " ", $Files_Label);
                    echo "<tr>";
                    echo "<td width='5%'>".$j++."</td>";
                    echo "<td width='75%'>".$Files_Label."</td>";
                    echo "<td width='20%'>".anchor(base_url().$DownloadURL.'/'.$Files_Key.'/'.$Files_Value,'<i class="fa fa-file-pdf" aria-hidden="true"></i> Download', 'class="btn btn-xs btn-danger" target="_blank"')."</td>";    
                  }
                                            
                }else{
                    $Files_Label = preg_replace('/\\.[^.\\s]{3,4}$/', '', $Files_Value);
                    $Files_Label = str_replace("_", " ", $Files_Label);
                    echo "<tr>";
                    echo "<td width='5%'>".$i++."</td>";
                    echo "<td width='75%'>".$Files_Label."</td>";
                    echo "<td width='20%'>".anchor(base_url().$DownloadURL.'/'.$Files_Value,'<i class="fa fa-file-pdf" aria-hidden="true"></i> Download', 'class="btn btn-xs btn-danger" target="_blank"')."</td>";    
                }
                echo "</tr>";                                        
                
           }

          echo '</tbody></table>';
          echo '</div>';
          echo '</section>';
        }
    }

}




if (!function_exists('updateVisitCounter')) {
    function updateVisitCounter() {
        $CI =& get_instance();
        $CI->load->helper('file');

        // Specify the path to the text file
        $counterFilePath = FCPATH . 'assets/visit_counter.txt';

        // Check if the file exists
        if (file_exists($counterFilePath)) {
            // Read the current counter value from the file
            $currentCounter = (int) read_file($counterFilePath);

            // Increment the counter
            $newCounter = $currentCounter + 1;

            // Write the updated counter value back to the file
            write_file($counterFilePath, $newCounter);

            // Return the updated counter value
            return $newCounter;
        } else {
            // If the file doesn't exist, create it and set the counter to 1
            write_file($counterFilePath, 1);

            // Return 1 as the initial counter value
            return 1;
        }
    }
}

?>