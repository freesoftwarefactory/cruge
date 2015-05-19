<?php
namespace cruge\interfaces;
/**
 * CrugeAuthInterface
 *  every client should implement this methods.
 *
 *	findByUsername, findIdentity and findIdentityByAccessToken should return
 *  a CrugeIdentity created by a call to CrugeClientBehavior->createIdentity.
 * 
 * @author Cristian Salazar H. <christiansalazarh@gmail.com> www.chileshift.cl 
 * @license FreeBSD {@link http://www.freebsd.org/copyright/freebsd-license.html}
 */
interface CrugeAuthInterface {
	/**
	 * findByUsername
	 * 	find a identity by its username
	 * 
	 * @param string $username 
	 * @access public
	 * @return CrugeIdentity instance or null
	 */
	public function findByUsername($username);
	/**
	 * validatePassword
	 *  compare the provided $password over the stored password.
	 * 
	 * @param CrugeInstance $identity the instance obtained by any finder.
	 * @param string $password the user input
	 * @access public
	 * @return boolean 
	 */
	public function validatePassword($identity, $password);
	/**
	 * findIdentity 
	 *  given a unique identfier ($id), lets find a matching identity.
	 * 
	 * @param string $id a unique identifier
	 * @access public
	 * @return CrugeIdentity instance or null
	 */
	public function findIdentity($id);
	/**
	 * findIdentityByAccessToken
	 *  given a accesstoken string, lets find a matching identity.
	 * 
	 * @param string $token 
	 * @param mixed $type 
	 * @access public
	 * @return CrugeIdentity instance or null
	 */
	public function findIdentityByAccessToken($token, $type = null);
}
