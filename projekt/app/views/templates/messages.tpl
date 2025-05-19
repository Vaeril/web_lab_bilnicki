<div class="messages error">
		<div class="welcome-hero-button">
				{foreach $msgs->getMessages() as $msg}
					<p style="color: #ff545a; 
    				font-size: 1.2em;">{$msg->text}</p>
				{/foreach}
		</div>
</div>
