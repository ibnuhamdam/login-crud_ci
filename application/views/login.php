<?php
$this->load->view('header');
//2. disini tampilkan flashdata dari controller
if ($this->session->flashdata('alert') == 'sukses_data') {
    echo "<script> alert('Sukses Daftar');</script>";
}else if ($this->session->flashdata('alert')=='gagal_login') {
    echo "<script> alert('Username / Password Salah!');</script>";
}

?>

<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <?php $atribut = array(
                'class' => 'login100-form validate-form p-l-55 p-r-55 p-t-178'
            );?>
            <?php
            echo form_open("Akun_C/cek_login",$atribut);
            //2.            isi dengan form_open ke controller Akun_C dengan method cek_login

            ?>
					<span class="login100-form-title">
						Login
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
                        Sign in
                    </button>
                </div>

                <div class="flex-col-c p-t-170 p-b-40">
						<span class="txt1 p-b-9">
							Ga Punya Akun?
						</span>

                    <a href="<?php echo site_url('Akun_C/daftar_view') ?>" class="txt3">
                        Daftar Dulu Sekarang
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
$this->load->view('footer'); ?>