function NavigationBar()
    {
    document.write('\
                                <div id="div_navigation">\
                                    <div id="w">\
                                            <nav>\
                                                    <ul id="navigation">\
                                                            <li><a href="#">Technology</a>\
                                                                    <ul>\
                                                                            <li><a href="../../technology/ddemoff/ddemoff.html">Mrs. Demoff</a></li>\
                                                                            <li><a href="../../technology/ssager/ssager.html">Mrs. Sager</a></li>\
                                                                            <li><a href="../../technology/cdelrio/cdelrio.html">Mrs. Del Rio</a></li>\
                                                                    </ul>\
                                                            </li>\
                                                            <li><a href="#">English</a>\
                                                                    <ul>\
                                                                            <li><a href="../../english/tbrown/tbrown.html">Mr. Brown</a></li>\
                                                                            <li><a href="../../english/dblockus/dblockus.html">Mr. Blockus</a></li>\
                                                                            <li><a href="../../english/rkientz/rkientz.html">Mr. Kientz</a></li>\
                                                                            <li><a href="../../english/llamson/llamson.html">Mrs. Lamson</a></li>\
                                                                            <li><a href="../../english/cguglielmana/cguglielmana.html">Mrs. Guglielmana</a></li>\
                                                                            <li><a href="../../english/jslinger/jslinger.html">Mrs. Slinger</a></li>\
                                                                            <li><a href="../../english/mchadwick/mchadwick.html">Mrs. Chadwick</a></li>\
                                                                            <li><a href="../../english/jzeller/jzeller.html">Mr. Zeller</a></li>\
                                                                    </ul>\
                                                            </li>\
                                                            <li><a href="#">Foreign Language</a>\
                                                                    <ul>\
                                                                            <li><a href="../../foreignlanguage/jduran/jduran.html">Mrs. Duran</a></li>\
                                                                            <li><a href="../../foreignlanguage/smatthews/smatthews.html">Mrs. Matthews</a></li>\
                                                                            <li><a href="../../foreignlanguage/kwolford/kwolford.html">Mrs. Wolford</a></li>\
                                                                            <li><a href="../../foreignlanguage/mwalsack/mwalsack.html">Mr. Walsack</a></li>\
                                                                    </ul>\
                                                            </li>\
                                                            <li><a href="#">History</a>\
                                                                    <ul>\
                                                                            <li><a href="../../history/msmith/msmith.html">Mrs. Smith</a></li>\
                                                                            <li><a href="../../history/smoloney/smoloney.html">Mr. Moloney</a></li>\
                                                                            <li><a href="../../history/tmercer/tmercer.html">Mr. Mercer</a></li>\
                                                                            <li><a href="../../history/smunz/smunz.html">Mrs. Munz</a></li>\
                                                                            <li><a href="../../history/rzeiter/rzeiter.html">Ms. Zeiter</a></li>\
                                                                    </ul>\
                                                            </li>\
                                                            <li><a href="#">Science</a>\
                                                                    <ul>\
                                                                            <li><a href="../../science/scurry/scurry.html">Mrs. Curry</a></li>\
                                                                            <li><a href="../../science/agoodis/agoodis.html">Mrs. Goodis</a></li>\
                                                                            <li><a href="../../science/cmcgowan/cmcgowan.html">Mr. McGowan</a></li>\
                                                                            <li><a href="../../science/gpurdum/gpurdum.html">Mr. Purdum </a></li>\
                                                                            <li><a href="../../science/nbarrie/nbarrie.html">Mrs. Barrie</a></li>\
                                                                            <li><a href="../../technology/ddemoff/ddemoff.html">Mrs. Demoff</a></li>\
                                                                    </ul>\
                                                            </li>\
                                                            <li><a href="#">Health</a>\
                                                                    <ul>\
                                                                            <li><a href="../../health/jaliff/jaliff.html">Mr. Aliff</a></li>\
                                                                            <li><a href="../../health/rdiggle/rdiggle.html">Coach Diggle</a></li>\
                                                                            <li><a href="../../health/djohnson/djohnson.html">Coach Johnson</a></li>\
                                                                            <li><a href="../../health/srains/srains.html">Mrs. Rains</a></li>\
                                                                    </ul>\
                                                            </li>\
                                                            <li><a href="#">Trades and Industry</a>\
                                                                    <ul>\
                                                                            <li><a href="../../trade/jlist/jlist.html">Mr. List</a></li>\
                                                                            <li><a href="../../trade/jjordan/jjordan.html">Mr. Jordan</a></li>\
                                                                            <li><a href="http://umhs.eduhsd.k12.ca.us/Departments/Trades/ROP/Index.htm">ROP Drafting Website</a></li>\
                                                                    </ul>\
                                                            </li>\
                                                            <li><a href="#">Visual and Performing Arts</a>\
                                                                    <ul>\
                                                                            <li><a href="../../arts/scurry/scurry.html">Mrs. Curry</a></li>\
                                                                            <li><a href="../../arts/pclemons/pclemons.html">Mr. Clemons</a></li>\
                                                                            <li><a href="../../arts/awarner/awarner.html">Mrs. Warner </a></li>\
                                                                            <li><a href="../../arts/pmiller/pmiller.html">Mr. Miller </a></li>\
                                                                            <li><a href="../../arts/etaylor/etaylor.html">Mrs. Taylor</a></li>\
                                                                            <li><a href="http://www.umhsmusic.org/">UMHS Music Website</a></li>\
                                                                    </ul>\
                                                            </li>\
                                              </ul>\
                                            </nav>\
                                    </div>\
                                </div>\
    ');
    }
function Head(teacher)
    {
    document.write('<meta http-equiv="content-type" content="text/html;charset=utf-8" /><meta http-equiv="cache-control" content="no-cache"><meta http-equiv="pragma" content="no-cache"><meta http-equiv="expires" content="-1"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><link rel="stylesheet" type="text/css" href="../../../css/style.css" /><link rel="stylesheet" type="text/css" href="../../../css/nav.css" /><script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script><script type="text/javascript" src="../../../js/nav.js"></script><script type="text/javascript" src="../../../js/TeacherInfo.js"></script><script type="text/javascript">getTitle("'+ teacher +'");</script>');  
    }
function Body(teacher)
    {
    document.write('<script type="text/javascript">Banner();</script><div id="div_outline" style="margin-top:10px;"><script type="text/javascript">NavigationBar();</script><div id="div_body"><script type="text/javascript">About("'+ teacher +'");</script><script type="text/javascript">Schedule("'+ teacher +'"); </script><script type="text/javascript">Contact("'+ teacher +'");</script><script type="text/javascript">Links("'+ teacher +'");</script></div></div>');  
    }
function Banner()
    {
    document.write('<div id="div_banner" style="text-align:center"><img class="banner"; src="../../../../image/base/banner.png"; alt="Union Mine Teacher Site" name="Union Mine Teacher Site";></div>');
    }
function About(teacher)
    {
    document.write('<div id="div_about"><div id="nameTeacher"><h2 class="font"><script type="text/javascript">getTeacherName("'+ teacher +'");</script></h2></div><div id="descriptionDepartment"><h3 class="font"><script type="text/javascript">getDepartment("'+ teacher +'");</script></h3></div><br/><div id="photoProfile"><script type="text/javascript">getProfilePicture("'+ teacher +'");</script></div><div id="descriptionTeacher"><p class="text"><script type="text/javascript">getDescription("'+ teacher +'");</script></p></div></div>');
    }
function Schedule(teacher)
    {
    document.write('<div id="div_schedule"><h3 class="font" style="text-decoration:underline">2012-2013 Schedule</h3><br/><table border="1px" class="table_classes"><tr><td><strong>Fall 2012</strong></td><td><strong>Spring 2013</strong></td></tr><tr></tr><tr><td>Block 1: <script type="text/javascript">getBlock1Fall("'+ teacher +'");</script></td><td>Block 1: <script type="text/javascript">getBlock1Spring("'+ teacher +'");</script></td></tr><tr><td>Block 2: <script type="text/javascript">getBlock2Fall("'+ teacher +'");</script></td><td>Block 2: <script type="text/javascript">getBlock3Spring("'+ teacher +'");</script></td></tr><tr><td>Block 3: <script type="text/javascript">getBlock3Fall("'+ teacher +'");</script></td><td>Block 3: <script type="text/javascript">getBlock3Spring("'+ teacher +'");</script></td></tr><tr><td>Block 4: <script type="text/javascript">getBlock4Fall("'+ teacher +'");</script></td><td>Block 4: <script type="text/javascript">getBlock4Spring("'+ teacher +'");</script></td></tr></table></div>');
    }
function Contact(teacher)
    {
    document.write('<div id="div_contact"><h3 class="font" style="text-decoration:underline">Contact Information</h3><br/><p class="text" style="line-height: 2;">Email:<script type="text/javascript">getEmail("'+ teacher +'");</script>Click Here!</a><br/><script type="text/javascript">getPhoneNumber("'+ teacher +'");</script></p></div>');
    }
function Links(teacher)
    {
    document.write('<div id="div_links"><a href="calendar.html"><img src="../../../../image/base/calendar.png" id="image_calendar" alt="Calendar" title="Calendar"></a><div id="div_calendar"><a href="calendar.html"><h3 class="hidden_link" style="font-family:verdana">Calendar</h3></a></div><script type="text/javascript">getGoogleDocs("'+ teacher +'");</script><img src="../../../../image/base/documents.png" id="image_documents" alt="Documents" title="Documents"><br/></a><div id="div_documents"><script type="text/javascript">getGoogleDocs("'+ teacher +'");</script><h3 class="hidden_link" style="font-family:verdana">Documents</h3></a></div><a href="resources.html"><img src="../../../../image/base/resources.png" id="image_resources" alt="Resources" title="Resources"></a><div id="div_resources"><a href="resources.html"><h3 class="hidden_link" style="font-family:verdana">Resources</h3></a></div></div>');
    }