<div class="container">
    <div class="row">
        <div class="col-md-12">
        <?php if($message = $this->session->flashdata('msg')){ ?>
            <p style="color: green;"><strong>Success!</strong> <?php echo  $message; ?><p>
            <?php } ?>


            <h2 class="text-white bg-primary">Manage Role</h2>
            <form action="<?php echo base_url().'admin/create_role'?>" method="post">
                    <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name"  placeholder="Enter name">
                    
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" id="email"  placeholder="Enter email" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="contact">contact address</label>
                    <input type="number" class="form-control" name="contact" id="contact"  placeholder="Enter contact">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="type">User Type</label>
                    <select name="type" class="form-control" id="type">
                    <option value="1">Admin</option>
                    <option value="2">Manager</option>
                    </select>
                </div>
                
                <button type="submit"  class="btn btn-block btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>