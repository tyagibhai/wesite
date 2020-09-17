
<section class="home-newsletter">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="single">
                    <h3>Want us to email you occasionally?</h3>
                <div class="input-group">
                    <input type="email" class="form-control" placeholder="Enter your email">
                    <span class="input-group-btn">
                    <button class="btn btn-theme" type="submit">Subscribe</button>
                    </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>

.home-newsletter {
background: #31246f;
}

.home-newsletter .single {
max-width: 650px;
margin: 0 auto;
text-align: center;
position: relative;
z-index: 2; }
.home-newsletter .single h3 {
font-size: 22px;
color: white;
text-transform: uppercase;
margin-bottom: 40px; }
.home-newsletter .single .form-control {
height: 50px;
background:#f0f0f0;
border-color: transparent;
border-radius: 20px 0 0 20px; }
.home-newsletter .single .form-control:focus {
box-shadow: none;
border-color: #243c4f; }
.home-newsletter .single .btn {
min-height: 50px;
border-radius: 0 20px 20px 0;
background: #31246e;
color: #fff;
border-color: #f0f0f0;
}
</style>

<script>
    export default {
        name: "Newsletter",
        mounted() {},
        computed: {},
        data() {
            return {
                
            }
        }
    }
</script>

