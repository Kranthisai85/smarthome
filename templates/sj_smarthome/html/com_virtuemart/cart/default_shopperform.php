<?php
/**
 *
 * Layout for the shopper form to change the current shopper
 *
 * @package	VirtueMart
 * @subpackage Cart
 * @author Maik K�nnemann
 *
 * @link http://www.virtuemart.net
 * @copyright Copyright (c) 2004 - 2013 VirtueMart Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * VirtueMart is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * @version $Id: cart.php 2458 2013-07-16 18:23:28Z kkmediaproduction $
 */
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');
?>

<div class="border-shipto">
<h3><?php echo vmText::_ ('COM_VIRTUEMART_CART_CHANGE_SHOPPER'); ?></h3>

<form action="<?php echo JRoute::_ ('index.php'); ?>" method="post" class="inline ">
	
		<div class="row">
		
				<div  class="col-md-6 col-xs-12">
					<input type="text" name="usersearch" size="20" maxlength="50">
					<input type="submit" name="searchShopper" title="<?php echo vmText::_('COM_VIRTUEMART_SEARCH'); ?>" value="<?php echo vmText::_('COM_VIRTUEMART_SEARCH'); ?>" class="button"  style="margin-left: 10px;"/>
				</div>
				
				<div  class="col-md-6 col-xs-12">
					<?php 
					if (!class_exists ('VirtueMartModelUser')) {
						require(VMPATH_ADMIN . DS . 'models' . DS . 'user.php');
					}

					$currentUser = $this->cart->user->virtuemart_user_id;
					echo JHtml::_('Select.genericlist', $this->userList, 'userID', 'class="vm-chzn-select" style="width: 200px"', 'id', 'displayedName', $currentUser,'userIDcart');
					?>
					<input type="submit" name="changeShopper" title="<?php echo vmText::_('COM_VIRTUEMART_SAVE'); ?>" value="<?php echo vmText::_('COM_VIRTUEMART_SAVE'); ?>" class="button"  style="margin-left: 10px;"/>
					<input type="hidden" name="view" value="cart"/>
					<input type="hidden" name="task" value="changeShopper"/>
				</div>
				
				
					
				
			
		</div>
	
	<?php if($this->adminID && $currentUser != $this->adminID) { ?>
		<b><?php echo vmText::_('COM_VIRTUEMART_CART_ACTIVE_ADMIN') .' '.JFactory::getUser($this->adminID)->name; ?></b>
	<?php } ?>
	<?php echo JHtml::_( 'form.token' ); ?>
</form>
<br />
</div>