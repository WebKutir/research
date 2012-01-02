<?php
$query = $em->createQuery(" SELECT m.memberName FROM Entities\Member m ");
$arr = $query->getArrayResult();
$retval['return'] = $arr;