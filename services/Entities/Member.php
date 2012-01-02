<?php

namespace entities;

/**
@Entity
@Table(name="member") */
class Member
{
	/**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

	/**
     * @Column(type="string", length=255, name="member_name")
     */
    private $memberName;

	/**
     * @Column(type="string", length=255)
     */
    private $password;


	public function getId() { return $this->id; }
	public function getMemberName() { return $this->memberName; }
	public function getPassword() { return $this->password; }

	public function setMemberName($x) { $this->memberName = $x; }
	public function setPassword($x) { $this->password = $x; }
}