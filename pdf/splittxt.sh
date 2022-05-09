#!/usr/bin/env bash
csplit -z -f splittxt $1 '/^Printed: 2022/*/' '{*}'
