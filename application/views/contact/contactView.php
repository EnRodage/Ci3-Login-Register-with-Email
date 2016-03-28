<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


        <div class="jumbotron">
            <h1>Contact</h1>
            <p>Laurent Dumont</p>
            <p>CH-2350 Saignelégier</p>
            <p><a href="mailto:enrodage@bluewin.ch">enrodage@bluewin.ch</a></p>
        </div>

			<form name="emailform" action="<?php echo  base_url();?>email" method="post">
			<p>Name :    <input type="text" name="name"/></p>
			<p>Email :    <input type="text" name="email"/></p>
			<p>Mobile:   <input type="text" name="mobile"/></p>
			<p>Comment: <textarea name="comment"></textarea></p>
			<p><input type="submit" name="submit" value="submit"></p>
			</form>
    

