<?php

namespace DCS\AddressBundle\Model;

use CrEOF\Spatial\PHP\Types\Geometry\Point;

interface CompactAddressInterface
{
    /**
     * Set point object
     *
     * @param \CrEOF\Spatial\PHP\Types\Geometry\Point $point
     * @return CompactAddressInterface
     */
    public function setPoint(Point $point = null);

    /**
     * @return \CrEOF\Spatial\PHP\Types\Geometry\Point
     */
    public function getPoint();
}
