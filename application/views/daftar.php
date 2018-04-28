<?php
$this->load->view('header');
//isi dengan meload view header
?>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <?php $atribut = array(
                'class' => 'login100-form validate-form p-l-55 p-r-55 p-t-178'
            );?>
            <?php
            echo form_open("Akun_C/daftar_akun",$atribut);
//            isi dengan form_open ke controller Akun_C dengan method daftar_akun
            ?>
					<span class="login100-form-title">
						Daftar
					</span>

                <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
                    <input class="input100" type="text" required name="username" placeholder="Username">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Please enter password">
                    <input class="input100" type="password" required name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                </div>

                <br>
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Daftar
                    </button>
                </div>

                <div class="flex-col-c p-t-170 p-b-40">
						<span class="txt1 p-b-9">
							Punya Akun?
						</span>

                    <a href="<?php echo site_url('Akun_C/index') ?>" class="txt3">
                        Login Langsung
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
//disini load view footer
$this->load->view('footer'); ?>