<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>The wall!</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <style type="text/css">
            #outline
            {
                padding: 70px 10px;
            }

            #wrapper
            {
                max-width: 1000px;
                margin: auto;
                border:1px solid #ddd;    
                padding: 10px;   
                border-radius: 5px;         
            }            

            .comments
            {
                border-left: 2px solid #666;
                font-size: 16px;
                margin-top:10px;
                padding:8px;
            }

            #newComment
            {
                margin-top: 10px;        
            }
            #newComment > input[type="text"], #newComment > input[type="submit"]
            {
                height:30px;
            }
            #newComment > input[type="text"]
            {
                width: 65%;
                border-radius: 10px 0px 0px 10px;                
            }
            #newComment > input[type="submit"]
            {
                border-radius: 0px 10px 10px 0px;                   
            }

        </style>
    </head>
    <body>
        <div id="outline">
            <div id="wrapper">
                <div>
                    <div>
                        <p class="s7" style="font-style: italic; padding-left: 10px;font-family: 'Courier New'">Comments...</p>
                                           
                    </div>

                    <div style="border-top:1px solid #00b; width:40%"></div>

                    <!-- Serverside code will output comments here -->
                    <?php                     	
						while($comment = $comments->fetchData())
							echo '<div class="comments">'.$comment['text'].'!!!!</div>';                        						                                                              
                    ?>

                    <form id="newComment" class="dataform" method="post" action="comments.php">
                        <input type="text" name="comment" placeholder="New comment...">
                        <input type="submit" value="Add">
                    </form>
                </div>
            </div>
        </div>
		
		<div style="text-align: right;position: fixed;z-index:9999999;bottom: 0; width: 100%;cursor: pointer;line-height: 0;display:block !important;">
			<a title="Hosted on free web hosting 000webhost.com. Host your own website for FREE." target="_blank" href="https://www.000webhost.com/?utm_source=000webhostapp&amp;utm_campaign=000_logo&amp;utm_medium=website_xterminator5000xtesting&amp;utm_content=footer_img">
				<img src="https://cdn.rawgit.com/000webhost/logo/e9bd13f7/footer-powered-by-000webhost-white2.png" alt="www.000webhost.com">
			</a>
		</div>
    


    </body>
</html>
