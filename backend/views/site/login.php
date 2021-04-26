<?php

use yii\bootstrap\ActiveForm;

$this->title = 'Login'; ?>

<div class="container-fluid p-0">
    <div class="row no-gutters">
        <div class="col-lg-4">
            <div class="authentication-page-content p-4 d-flex align-items-center min-vh-100">
                <div class="w-100">
                    <div class="row justify-content-center">
                        <div class="col-lg-9">
                            <div class="text-center">
                                <div>
                                    <a href="<?= Yii::$app->homeUrl; ?>" class="logo">
                                        <img src="<?= $this->imagesUrl('images/version.png') ?>" class="w-50" alt="logo">
                                    </a>
                                </div>
                                <h4 class="font-size-18 mt-4">Xush kelibsiz!</h4>
                                <p class="text-muted">Ilmiy-amaliy o'quv markazga</p>
                            </div>

                            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                            <div class="p-2 mt-5">
                                <form class="form-horizontal">

                                    <div class="form-group auth-form-group-custom mb-4">
                                        <i class="ri-user-2-line auti-custom-input-icon"></i>
                                        <label for="username">Username</label>
                                        <?= $form->field($model, 'username', ['template' => '{input} {error} {hint}'])
                                            ->textInput([
                                                'autofocus' => true,
                                                'class' => 'input-lg form-control',
                                                'placeholder' => 'username kiriting',
                                            ])->label(false); ?>
                                    </div>

                                    <div class="form-group auth-form-group-custom mb-4">
                                        <i class="ri-lock-2-line auti-custom-input-icon"></i>
                                        <label for="userpassword">Parol</label>
                                        <?= $form->field($model, 'password', ['template' => '{input} {error} {hint}'])
                                            ->passwordInput([
                                                'autofocus' => true,
                                                'class' => 'input-lg form-control',
                                                'placeholder' => 'parolni kiriting',
                                            ])->label(false); ?>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="LoginForm[rememberMe]" class="custom-control-input" value="1" id="loginform-rememberme">
                                        <label class="custom-control-label" for="loginform-rememberme">Eslab qolsinmi?</label>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">
                                           Kirish
                                        </button>
                                    </div>


                                    <div class="mt-4 text-center">
                                        <a href="<?= \yii\helpers\Url::to('/auth/request-password-reset') ?>" class="text-muted"><i class="mdi mdi-lock mr-1"></i> Parolni qayta tiklash?</a>

                                    </div>
                                    <div class="mt-4 text-center">

                                        <a href="<?= \yii\helpers\Url::to('/auth/resend-verification-email') ?>" class="text-muted"><i class=""></i> Yangi tasdiqlash xati kerakmi?</a>
                                    </div>

                                </form>
                            </div>
                            <?php ActiveForm::end(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="authentication-bg">
                <div class="bg-overlay"></div>
            </div>
        </div>
    </div>
</div>