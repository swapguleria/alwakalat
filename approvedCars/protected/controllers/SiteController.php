<?php

class SiteController extends Controller
    {
    public $layout = '/layouts/column1';

    /**
     * Declares class-based actions.
     */
    public function actions()
        {
        return array(
// captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
// They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
        }

    public function actionIndex()
        {

        $this->pageCaption = "Alwakalat";
        $this->layout = '//layouts/column1';
        $this->redirect('user/login');
        $model = new User('create');

        if (isset($_POST ['User']))
            {
//            print_r($_POST);
//            die();
            $model->setAttributes($_POST ['User']);
            $already_subscribed = Yii::app()->mailchimp->emailExists($model->email);
            if ($already_subscribed)
                {
                Yii::app()->user->setFlash('error', $model->email . ' Email Already Subscribed ');
//                echo $model->addError('email', 'Email Already Subscribed.');
                $this->redirect(array('site/index#neewletter_sucess'));
                }
            else
                {
                $model->setAttributes($_POST ['User']);

                $subscribe = Yii::app()->mailchimp->listSubscribe($model->email, $model->first_name, $doubleOptIn = true);
//                $subscribe = Yii::app()->mailchimp->emailExists($model->email);
                if ($subscribe)
                    {
//                    echo "Sda";
                    Yii::app()->user->setFlash('newsletter', 'Please Check your email ' . $model->email);
                    $this->redirect(array('site/index#neewletter_sucess'));   //redirect to action that you want.
                    }
//                else
//                    {
////                    echo "not Sent";
//                    }
                }
            }
//        $this->updateMenuItems($model);
        $this->render('index', array('model' => $model));
        }

    public function actionAbout()
        {
        $this->pageCaption = "About - Alwakalat";
        $this->layout = '//layouts/column1';
        $this->render('about');
        }

    public function actionApprovedCars()
        {
        $this->pageCaption = "About - Alwakalat";
        $this->layout = '//layouts/column1';
        $this->render('approvedCarsMain');
        }

    public function actionMenu()
        {
        $this->pageCaption = "Menu - Alwakalat";
        $this->layout = '//layouts/column1';
        $this->render('menu');
        }

    public function actionEvents()
        {
        $this->pageCaption = 'Events - Alwakalat';
        $this->layout = '//layouts/column1';
        $this->render('events');
        }

    public function actionblog()
        {
        $this->pageCaption = 'Blog - Alwakalat';
        $this->layout = '//layouts/column1';
        $this->render('blog');
        }

    public function actionEmail($email)
        {

        $model = new Answer();
        $model->email = $email;

        if ($model->save()) echo json_encode("data is Save");
        else
            {

            echo json_encode("data is Not Save");
            }

//$this->render('index2');
        }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
        {
        if ($error = Yii::app()->errorHandler->error)
            {
            if (Yii::app()->request->isAjaxRequest) echo $error['message'];
            else $this->render('error', $error);
            }
        }

    /**
     * Displays the contact page
     */
//    public function actionContact()
//        {
//        $this->pageCaption = 'Contact - Alwakalat';
//        $this->layout = '//layouts/column1';
//        $this->render('events');
//        }
//    public function actionProduct()
//        {
//        $model = new User();
//        $this->render('product', array('model' => $model));
//        }
//    public function actionAnswer($answer)
//        {
//
//        $ans = new Answer;
//        $ans->answer = $answer;
//        if ($ans->save()) echo json_encode("data is Save");else
//            {
//
//            echo json_encode("data is Not Save");
//            }
//
//        //$this->render('index2');
//        }

    public function actionContact()
        {
//        $to = "himekaranguleria@gmail.com";
//        $subject = "contact us";
//        $txt = "Hello world!";
//        $headers = "From: webmaster@example.com" . "\r\n" .
//                "CC: somebodyelse@example.com";
//
//        mail($to, $subject, $txt, $headers);
//        mail("swap.guleria@gmail.com", "My subject", 'sad');
        $this->pageCaption = 'Contact - Alwakalat';
        $this->layout = '//layouts/column1';
        $model = new ContactForm('contact-form');

        if (isset($_POST['ContactForm']))
            {
            print_r($_POST);
            mail("swap.guleria@gmail.com", "My subject", 'sad');
            die();
////             $retval = mail('swap.guleria@gmail.com', 'asd', 'himekaranguleria@gmail.com');
//            die();
//            $model->attributes = $_POST['ContactForm'];
////            $model->sendContactFormMail();
//            if ($model->validate())
//                {
////                echo " in ";
////                $headers = "From: {$model->email}\r\nReply-To: {$model->email}";
////                mail(Yii::app()->params['adminEmail'], 'test', $model->message, $headers);
////          
////                  mail("swap.guleria@gmail.com","My subject",'sda');       
////                $mail = mail('swap.guleria@gmail.com', 'test', "SAd", $headers);
////                if (@$mail)
////                    {
////                   
////                }
////            print_r($mail);
////            die('end');
//
//
//
            $to = Yii::app()->params['adminEmail'];
            $email = $model->email;
            $message = $model->message;


            $subject = "Contact Request";
//
            $message = ' 
                        <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
                        <html>
                            <head>
                                <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

                            </head>
                            <body style="margin: 0;
                                  font-family: Tahoma, sans-serif;">
                                <table width="100%" id="html"  style="background-color: #eee;
                                       width: 100%;
                                       height: 100%;
                                       margin: 0 auto;" border="0" cellpadding="0"
                                       cellspacing="0">
                                    <tr>
                                        <td align="center" valign="top">
                                            <table width="650px" id="body" style="width: 500px;
                                                   margin: 0 auto;
                                                   font-size: 12px;
                                                   color: #333333;
                                                   background-color: #fff;
                                                   border: 1px solid antiquewhite;
                                                   text-valign: center;" border="0" cellpadding="0"
                                                   cellspacing="20">
                                                <tr>
                                                    <td id="header" style="color: white;
                                                        font-size: 1.2em;
                                                        padding: 15px;
                                                        background: #108c74;
                                                        text-align: center;
                                                        text-valign: center;
                                                        font-weight: bold;
                                                        margin-bottom: 30px;
                                                        border-radius: 4px 4px 4px 4px;">Hello &nbsp;<b> Alwakalat </b></td>
                                                </tr>
                                                <tr>
                                                <div class="mail-box" style="
                                                     width:350px;
                                                     margin:auto;">

                                                    <div class="mail-content" style="
                                                         font-size:14px;
                                                         padding:10px;">

                                                        <p>
                                                            <b>Name</b>: ' . $model->name . ' </p>
                                                        <p><b>Email</b>: ' . $email . ' </p>
                                                        <p><b>Message</b>:' . $message . '
                                                            Please.</br>

                                                        </p>


                                                    </div>
                                                </div><p>
                                                    Sincerely,<br> Juniper tree.
                                                </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td id="footer" style="background: #108c74;
                                            color: #E2E2E2;
                                            border-radius: 4px 4px 4px 4px;
                                            margin-top: 30px;
                                            padding: 15px;
                                            text-weight: bold;
                                            text-align: center;
                                            text-valign: center;">
                                            <p>
                                                Copyright &copy;
                                                ' . date("Y") . ' 
                                                by
                                                Swap Developers
                                                . All Rights Reserved.<br />
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </body>
                        </html>
                        ';
            $header = "From:" . $email . " \r\n";
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-type: text/html\r\n";

            $retval = mail('swap.guleria@gmail.com', 'asd', 'himekaranguleria@gmail.com');

            if ($retval)
                {
//                    echo "DAF";
                Yii::app()->user->setFlash('contact', '<div class="alert alert-success">' . 'Thank you for contacting us. We will respond to you as soon as possible.' . '</div>');
//                    die("SAd");
                }
            else
                {
//                     echo "ef";
                Yii::app()->user->setFlash('contact', '<div class="alert alert-success">' . 'Thank you for contacting us. We will respond to you as soon as possible.' . '</div>');
//                    die("SAds");
                }
            }
//            }
//
//
//









        $this->render('contact', array('model' => $model));
        }

//    public function actionPrivacy()
//        {
//        $criteria = new CDbCriteria;
//        $criteria->addCondition('type_id = ' . Page::PAGE_PRIVACY_POLICY);
//        $page = Page::model()->find($criteria);
//
//        $this->render('privacy', array('page' => $page));
//        }
//    public function actionTerms()
//        {
//        $criteria = new CDbCriteria;
//        $criteria->addCondition('type_id = ' . Page::PAGE_TERM_CONDITION);
//        $page = Page::model()->find($criteria);
//        $this->render('terms', array('page' => $page));
//        }

    public function actionDeleteAssets()
        {
        $path = Yii::app()->basePath . '/../assets';
        User::rrmdir($path);
        $runtime = Yii::app()->runtimePath;
        User::rrmdir($runtime);
        }

    public function actionSitemap()
        {
//lastmod

        $map_links = array(
            array(
                'loc' => Yii::app()->createAbsoluteUrl('/'),
                'changefreq' => 'daily',
                'priority' => '1',
                'lastmod' => date('Y-m-d\TH:i:sP'),
            ),
            array(
                'loc' => Yii::app()->createAbsoluteUrl('/site/index'),
                'changefreq' => 'daily',
                'priority' => '0.8',
                'lastmod' => date('Y-m-d\TH:i:sP'),
            ),
            array(
                'loc' => Yii::app()->createAbsoluteUrl('/site/terms'),
                'changefreq' => 'daily',
                'priority' => '0.8',
                'lastmod' => date('Y-m-d\TH:i:sP'),
            ),
            array(
                'loc' => Yii::app()->createAbsoluteUrl('/site/privacy'),
                'changefreq' => 'daily',
                'priority' => '0.8',
                'lastmod' => date('Y-m-d\TH:i:sP'),
            ),
            array(
                'loc' => Yii::app()->createAbsoluteUrl('/site/contact'),
                'changefreq' => 'daily',
                'priority' => '0.8',
                'lastmod' => date('Y-m-d\TH:i:sP'),
            ),
        );
        Yii::import('ext.Sitemap');
        $sitemap = new Sitemap();
        $sitemap->AddData($map_links);
        $sitemap->getSitemapUrls(0.4);
        $sitemap->renderXML();
        }

    }
