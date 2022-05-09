#!/usr/bin/env bash
csplit -z -f split/splittxt $1 '/^Printed: 2022/*/' '{*}'
